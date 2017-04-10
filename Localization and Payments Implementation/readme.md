Create a site: Throw-a-Coin-in-the-Fountain. The idea is that users can come to this site, customize their digital, coin-in-fountain wish, list people they want to share their wish with, select a payment method, charge their wish using Stripe, and receive via mail, along with their shared friends, a link to a PDF that commemorates their wish. I am flexible on the exact design of your site but it needs to meet the following requirements: 
(a) The site should use the MVA pattern and folder structure of HW3 and HW4. 
(b) Only the index.php file is allowed to contain code not in a class. 
(c) All classes should be documented with a phpdoc docblock that says what the class does in a more meaningful way than just the title of the class, all methods need to be documented in a similarly meaningful way and have appropriate @param and @return declarations. 
(d) Your project should be developed using Composer and classes should be loaded not using requires, but using Composer's autoloader. The grader will run composer install to generate the autoloader and to load any needed dependencies, so you can submit an empty vendor folder. 
(e) PDF generation should be done using setasign/fpdf which should be a dependency required in your composer.json file. 
(f) Somewhere on your landing page you should let users choose between two different languages, defaulting initially to English, and when you output text on your website you use gettext to output it in the language currently chosen. 
(g) In addition to the wisher's name, your site should collect at least three different customizations on the kind of fountain and that the wisher wants to throw their virtual coin into. A current image of the fountain as customized so-far should be displayed as the user selects customizations. 
(h) When a user has finished creating their wish by entering their credit card info and clicking a "Throw-A-Coin" button, a credit charge should be made using Stripe. The grader should be able to test using the test card numbers at https://stripe.com/docs/testing#cards. The Stripe charge amount should always be fixed at a particular amount set in your configs/Config.php file (say $0.25). Stripe API keys should be configured there as well. DO NOT give the grader your live keys. You can leave test keys, but assume the grader will add their own. The Readme.txt file should say if there is anything weird the grader needs to do to set this up. 
(i) If the credit card transaction is not approved an error message should be given, if it is approved a salutory email message containing a unique url to a PDF where the user can download a file commemorating their wish should be sent to the wisher and their shared friends using PHP's mail() function. 
(j) The link mentioned in (i) allows a user to download a PDF of their wish, this PDF should contain all the details of their wish. The link should work to get this wish even if subsequent wishes are made.




#Setup

Drag the folder into Apache document root.

Run composer install from the command line to install dependencies like gettext, stripe, etc.

Navigate to the Hw5 directory and from the command line, run php CreateDB.php to intialize the database and table. Please make sure you have ran the composer command in step 2 as we use a mysqli helper class which can effect your db creation.

You should be at the main page and have the ability to enter data. Please enter a valid test card from https://stripe.com/docs/testing (We used 4242424242424242) and a future expiration month and year.

If you enter data in an incorrect format, proper validation will be thrown. On the next page you will see a link to download your submission in pdf format or send another wish.

Note: You should have a smtp mail server set up to test the mail functionality, we have verified it on our end.

Note: In our config we used 127.0.0.1 as our DBHOST, please make sure to update the config file with your Apache configuration.

Note: In our config we are leaving our stripe keys but feel free to replace them with yours. The assignment says to assume you will be putting in your own keys.