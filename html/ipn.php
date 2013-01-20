<?php
/*
ipn.php - example code used for the tutorial:

PayPal IPN with PHP
How To Implement an Instant Payment Notification listener script in PHP
http://www.micahcarrick.com/paypal-ipn-with-php.html

(c) 2011 - Micah Carrick
*/

// configuration
require("../includes/config.php"); 

   
// tell PHP to log errors to ipn_errors.log in this directory
ini_set('log_errors', true);
ini_set('error_log', dirname(__FILE__).'/ipn_errors.log');

// intantiate the IPN listener
include('ipnlistener.php');
$listener = new IpnListener();

// tell the IPN listener to use the PayPal test sandbox
$listener->use_sandbox = true;

// try to process the IPN POST
try {
    $listener->requirePostMethod();
    $verified = $listener->processIpn();
} catch (Exception $e) {
    error_log($e->getMessage());
    exit(0);
}

if ($verified) {

    $errmsg = '';   // stores errors from fraud checks
    
    // 1. Make sure the payment status is "Completed" 
    if ($_POST['payment_status'] != 'Completed') { 
        // simply ignore any IPN that is not completed
        exit(0); 
    }

    // 2. Make sure seller email matches your primary account email.
    if ($_POST['receiver_email'] != 'veritasks.harvard@gmail.com') {
        $errmsg .= "'receiver_email' does not match: ";
        $errmsg .= $_POST['receiver_email']."\n";
    }
    /*
    // 3. Make sure the amount(s) paid match
    if ($_POST['mc_gross'] != '9.99') {
        $errmsg .= "'mc_gross' does not match: ";
        $errmsg .= $_POST['mc_gross']."\n";
    }
    
    */
    
    // 4. Make sure the currency code matches
    if ($_POST['mc_currency'] != 'USD') {
        $errmsg .= "'mc_currency' does not match: ";
        $errmsg .= $_POST['mc_currency']."\n";
    }

    /*
    // 5. Ensure the transaction is not a duplicate.
    mysql_connect('localhost', 'DB_USER', 'DB_PW') or exit(0);
    mysql_select_db('DB_NAME') or exit(0);
    
    $txn_id = mysql_real_escape_string($_POST['txn_id']);
    $sql = "SELECT COUNT(*) FROM orders WHERE txn_id = '$txn_id'";
    $r = mysql_query($sql);
    
    if (!$r) {
        error_log(mysql_error());
        exit(0);
    }
    
    $exists = mysql_result($r, 0);
    mysql_free_result($r);
    
    if ($exists) {
        $errmsg .= "'txn_id' has already been processed: ".$_POST['txn_id']."\n";
    }
    */
    
    if (!empty($errmsg)) {
    
        // manually investigate errors from the fraud checking
        $body = "IPN failed fraud checks: \n$errmsg\n\n";
        $body .= $listener->getTextReport();
        mail('veritasks.harvard@gmail.com', 'IPN Fraud Warning', $body);
        
    } 
    else {
        mail('veritasks.harvard@gmail.com', 'Valid IPN', $listener->getTextReport());
        // make order paid for
        $results = query("UPDATE tasks SET paid=1 WHERE id = ?",$_SESSION["lastCreatedTask"]);
        if ($results === false)
        {
            apologize("Unable to update task for your confirmed payment. Please contact us");
        }
        
        /*
        // send user an email with a link to their digital download
        $to = filter_var($_POST['payer_email'], FILTER_SANITIZE_EMAIL);
        $subject = "Your digital download is ready";
        mail($to, "Thank you for your order", "Download URL: ...");
        
        */
    }
    
} else {
    // manually investigate the invalid IPN
    mail('veritasks.harvard@gmail.com', 'Invalid IPN', $listener->getTextReport());
}

?>
