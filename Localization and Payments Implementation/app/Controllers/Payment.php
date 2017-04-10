<?php

namespace Controllers;
/**
 * This is controller which will handle payment
 * and send emails.
 *
 * @author Kareem, Kevin, Avinash.
 */
class Payment extends Base {
    
    /**
     * @var \Models\Postcard Postcard db for successful payments
     */
    
    private $postcard;
    /**
    * Method to submit payment request, make payment and store postdard data
    * if request was successful.
    *   
    * @return void
    */

    public function submit() {
        // set up stripe
        \Stripe\Stripe::setApiKey(\Configs\Config::STRIPE_PRIVATE_KEY);
        
        $view = new \Views\Payment();
        
        try {
            // populate credit card info from user
            $myCard = array(
                'number' => $_POST['card_num'], 
                'exp_month' => $_POST['exp_month'], 
                'exp_year' => $_POST['exp_year']);
            
            if (
                    empty($myCard['number']) || !is_numeric($myCard['number'])
                    || empty($myCard['exp_month']) || !is_numeric($myCard['exp_month'])
                    || empty($myCard['exp_year']) || !is_numeric($myCard['exp_year'])) {
                 throw new \Exception(_("PROVIDE_VALID_CARD_DATA"));
            }
            // make a charge
            $charge = \Stripe\Charge::create(array(
                'card' => $myCard, 
                'amount' => \Configs\Config::WISH_PRICE, 
                'currency' => \Configs\Config::WISH_PRICE_CURRENCY));
            
            // in case of successfull payment:
            $this->storeData();
            $this->sendEmails($view, array("postcard" => $this->postcard));
            
            echo $view->renderSuccess(array("postcard" => $this->postcard));
        } catch (\Exception $ex) {
            echo $view->renderError(array("message" => $ex->getMessage()));
        }
    }

    /**
    * Method to store Postcard Data  in DB. 
    *
    * @return void
    */
    public function storeData() {
        $this->postcard = new \Models\Postcard();
        $this->postcard->wisher = $_POST['wisher'];
        $this->postcard->image = $_POST['fountain'];
        $this->postcard->border = $this->postcard->getBorderValue(
                $_POST['border-style'], $_POST['border-color']);
        $this->postcard->save();
    }

    /**
    * Method to send emails. 
    *
    * @param \Views\Payment $view, it is an object of Payment class Under Views, 
    * @param String $data, associate array of postcard and postcard details.
    *  
    * @return void
    */

    public function sendEmails(\Views\Payment $view, $data) {
        $mails = explode(',', $_POST['targets']);
        $valid_addresses = array();
        foreach($mails as $email) {
            if (preg_match('/[a-z\\.]+@[a-z\\.]+\\.(com|hu|biz|me|net|org|edu|gov)/i', $email)) {
                $valid_addresses[] = "<$email>";
            }
        }
        // TODO: remove
        //var_dump($valid_addresses);
        mail(
                implode(',',$valid_addresses), 
                 _("MAIL_SUBJECT"), 
                $view->renderEmail($data), 
                "From: " . \Configs\Config::FROM_EMAIL_ADDRESS);
    }

}