<?php
namespace cmpe174\hw3\views\elements;

use cmpe174\hw3\views as V;

require_once('Element.php');

class newestElement extends Element
{
    public function render($data){
        ?>
        <div>
                <h3>Newest</h3>
                <?php
                    require_once("./src/views/helpers/listHelper.php");
					$rate = new V\helpers\listHelper();
					$rate->renderWithType($data,"Submission Date");
                ?>
         </div>


<?php
    }
}