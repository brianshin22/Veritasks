<?php

     require("../includes/config.php");
    
    $id = $_SESSION["taskid"];

    $userid = $_SESSION["id"];
    
    $task = query("SELECT * FROM tasks WHERE id = ?", $id);
    if($task === false)
    {
        apologize("Could not retrieve task information");
    }
    
    
    // if submit task button was clicked
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {    
        
        if($_SESSION["tasktype"] == 1)
        {
        
            $confirm = $_POST["confirmcode"];
            $realcode = $task[0]["confirmationcode"];
            if($realcode === false)
            {
                apologize("Could not retrieve the actual confirmation code of the task.");
            }
            
          
            if (empty($confirm))
            {
                apologize("Please enter a confirmation code!");
            }
            
            else if($confirm != $realcode)
            {
                apologize("You entered the wrong confirmation code!");
            }
            
            $answer = "";
        }
        
        else if($_SESSION["tasktype"] == 2)
        {
            if(empty($_POST["vquestion"]))
            {
                apologize("Please answer the question to complete the task.");               
            }
            
            else
            {
                $answer = $_POST["vquestion"];
            }
            
        }
    
        $completed = query("UPDATE completion SET time_end = now(), question = ?, submitted=1 WHERE task_id = ? AND completer = ?", $answer, $id, $userid);
        if ($completed === false)
        {
            apologize("Could not insert the completed task into the database.");
        }
        $minutes = query("UPDATE completion SET minutesTaken = TIMESTAMPDIFF(MINUTE, time_begin, time_end) WHERE task_id = ? AND completer = ?", $id, $userid);
        if($minutes === false)
        {
            apologize("Could not update the minutes taken for the completed task.");
        }
        
        $number = query("UPDATE tasks SET numCompletions = numCompletions + 1 WHERE id = ?", $id);
        if($number === false)
        {
            apologize("Could not log the completed task into the number completed.");
        }
        
        
        $money = $task[0]["money"];
        
        //echo $money;
        
        $addMoney = query("UPDATE users SET money = money + ? WHERE id = ?", $money, $userid);
        if($addMoney === false)
        {
            apologize("Could not add money to users total");
        }
        
        
        $_SESSION["taskid"]= "";
        
        $paypalemail = query("SELECT paypalemail FROM users WHERE id = ?", $_SESSION["id"]);
        
        
        if($paypalemail === false)
        {
            apologize("Could not get Paypal email address of the user");
        }
        
        $address = $paypalemail[0]["paypalemail"];
        
        
        
        $updatedMoney = query("SELECT money FROM users WHERE id = ?", $userid);
        
        if($updatedMoney === false)
        {
            apologize("Could not retrieve updated money");
        }
        
        
        //redirect("nvp_MassPay.php");
        
        
        /**********************************************************************************
        Begin nvp_MassPay.php
        
        ************************************************************************************/

/** MassPay NVP example; last modified 08MAY23.
 *
 *  Pay one or more recipients. 
*/

$environment = 'sandbox';	// or 'beta-sandbox' or 'live'

/**
 * Send HTTP POST Request
 *
 * @param	string	The API method name
 * @param	string	The POST Message fields in &name=value pair format
 * @return	array	Parsed HTTP Response body
 */
function PPHttpPost($methodName_, $nvpStr_) {
	global $environment;

	// Set up your API credentials, PayPal end point, and API version.
	$API_UserName = urlencode('Dora_1354846300_biz_api1.college.harvard.edu');
	$API_Password = urlencode('1354846320');
	$API_Signature = urlencode('AlXR1LLpK55JKJpnzxPhuK0lVgHBA8DpYiaIDF2CkbGAdqIHyjZYyJWZ');
	$API_Endpoint = "https://api-3t.paypal.com/nvp";
	if("sandbox" === $environment || "beta-sandbox" === $environment) {
		$API_Endpoint = "https://api-3t.$environment.paypal.com/nvp";
	}
	$version = urlencode('51.0');

	// Set the curl parameters.
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $API_Endpoint);
	curl_setopt($ch, CURLOPT_VERBOSE, 1);

	// Turn off the server and peer verification (TrustManager Concept).
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);

	// Set the API operation, version, and API signature in the request.
	$nvpreq = "METHOD=$methodName_&VERSION=$version&PWD=$API_Password&USER=$API_UserName&SIGNATURE=$API_Signature$nvpStr_";

	// Set the request as a POST FIELD for curl.
	curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);

	// Get response from the server.
	$httpResponse = curl_exec($ch);

	if(!$httpResponse) {
		exit("$methodName_ failed: ".curl_error($ch).'('.curl_errno($ch).')');
	}

	// Extract the response details.
	$httpResponseAr = explode("&", $httpResponse);

	$httpParsedResponseAr = array();
	foreach ($httpResponseAr as $i => $value) {
		$tmpAr = explode("=", $value);
		if(sizeof($tmpAr) > 1) {
			$httpParsedResponseAr[$tmpAr[0]] = $tmpAr[1];
		}
	}

	if((0 == sizeof($httpParsedResponseAr)) || !array_key_exists('ACK', $httpParsedResponseAr)) {
		exit("Invalid HTTP Response for POST request($nvpreq) to $API_Endpoint.");
	}

	return $httpParsedResponseAr;
}

// Set request-specific fields.
$emailSubject =urlencode('example_email_subject');
$receiverType = urlencode('EmailAddress');
$currency = urlencode('USD');							// or other currency ('GBP', 'EUR', 'JPY', 'CAD', 'AUD')

// Add request-specific fields to the request string.
$nvpStr="&EMAILSUBJECT=$emailSubject&RECEIVERTYPE=$receiverType&CURRENCYCODE=$currency";

$receiversArray = array();

//for($i = 0; $i < 3; $i++) {
	$receiverData = array(	'receiverEmail' => $address, //"Power_1355000947_per@college.harvard.edu",
							'amount' => $money,
							'uniqueID' => $userid,
							'note' => "Payment from Veritasks");
	$receiversArray[0] = $receiverData;
//}

foreach($receiversArray as $i => $receiverData) {
	$receiverEmail = urlencode($receiverData['receiverEmail']);
	$amount = urlencode($receiverData['amount']);
	$uniqueID = urlencode($receiverData['uniqueID']);
	$note = urlencode($receiverData['note']);
	$nvpStr .= "&L_EMAIL$i=$receiverEmail&L_Amt$i=$amount&L_UNIQUEID$i=$uniqueID&L_NOTE$i=$note";
}

// Execute the API operation; see the PPHttpPost function above.
$httpParsedResponseAr = PPHttpPost('MassPay', $nvpStr);

if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {
	
	// exit('MassPay Completed Successfully: '.print_r($httpParsedResponseAr, true));
	render("confirmation_form.php", array("name"=>$_SESSION["name"], "money"=>$updatedMoney[0]["money"]));
	
} else  {
	//exit('MassPay failed: ' . print_r($httpParsedResponseAr, true));
	apologize("We're terribly sorry. It doesn't look like the payment went through successfully. Please contact us at veritasks.harvard@gmail.com to solve this issue.");
}

    
        
        
    /****************************     END nvp_MassPay.php       ******************************************************************/
        
        
    }
    
    // if received render call from surveydescription.php
    else
    {
        
        if($_SESSION["tasktype"] == 1)
        {
            $embed = $task[0]["surveyembed"];
            if (empty($embed))
            {
                apologize("Could not retrieve information for the task");
            }
            
            render("dosurvey_form.php", array("id" => $userid, "embed" =>$embed));
        }
        
        else if($_SESSION["tasktype"] == 2)
        {
            $embed = $task[0]["videoembed"];
            if (empty($embed))
            {
                apologize("Could not retrieve information for the task");
            }
            
            $question = $task[0]["question"];
            if (empty($question))
            {
                apologize("Could not retrieve question for the task");
            }
        
            render("dovideo_form.php", array("id" => $_SESSION["id"], "embed" =>$embed, "question" => $question));
        }
        else if($_SESSION["tasktype"] == 3)
        {
            $embed = $task[0]["audioembed"];
            if (empty($embed))
            {
                apologize("Embed link for audio is empty");
            }
            
            $question = $task[0]["question"];
            if (empty($question))
            {
                apologize("Could not retrieve question for the task");
            }
  
            render("dosurvey_form.php", array("id" => $_SESSION["id"], "embed" =>$embed, "question" => $question));
        }
        
        else
        {
            apologize("Sorry, the survey you are trying to access is malfunctioning! Pick another one!");
        }
        
        
        
    
        
    }
      

?>
