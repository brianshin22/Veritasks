<?php

    // configuration
    require("../includes/config.php"); 
    require_once("lib/MailClass.inc");
    $regex = "/^\w+@(\w*\.)?harvard.edu$/";
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate inputs
        if (empty($_POST["email"]) || !preg_match($regex, $_POST["email"]))
        {
            apologize("You must enter a valid Harvard email address.");
        }
        else if (empty($_POST["password"]))
        {
            apologize("You must choose a password.");
        }
        else if (empty($_POST["username"]))
        {
            apologize("You must enter your name.");
        }
        else if (empty($_POST["confirmation"]) || $_POST["password"] != $_POST["confirmation"])
        {
            apologize("Those passwords did not match.");
        }
        
        $name = $_POST["username"];
        $email = $_POST["email"];
        $hash = md5(rand(0,1000));
        
        // try to register user
        $results = query("INSERT INTO users2 (name, email, password, hash, active) VALUES(?, ?, ?, ?, 0)",
        $_POST["username"], $email, crypt($_POST["password"]), $hash);
        
        if ($results === false)
        {
            apologize("That username or email address appears to be taken.");
        }

 
        $msg = 'Your account has been created! Please click the link to confirm your registration. You can enter your login information and the verification code given below.' .PHP_EOL;
        $msg.= "http://" . $_SERVER["SERVER_NAME"]."/verify.php?email="  .$email ."&hash=".$hash .PHP_EOL . "Verification code: " .$hash .PHP_EOL."Sincerely," .PHP_EOL . "hSub";
        $msg.= "";
        
        $mailer = new PHPMailer();
        $mailer->IsSMTP();
        $mailer->SMTPdebug = 0;
        $mailer->SMTPAuth = true;
        $mailer->SMTPSecure = 'ssl';
        $mailer->Host = 'smtp.gmail.com';
        $mailer->Port = '465';
        $mailer->Username = 'brianshin22@gmail.com';
        $mailer->Password = 'boarder3922';
        $mailer->SetFrom('brianshin22@gmail.com', 'Harvard Sublets');
        $mailer->Subject = 'Thanks for registering with hSub!';
        $mailer->Body = $msg;

        $mailer->AddAddress($email, $name);

        
        if(!$mailer->Send())
        {
            echo 'There was a problem sending this mail!';
        }
        else
        {
            render("confirmation_form.php", array("title" => "Registration confirmed"));
            // echo 'Mail sent to ' . $name . " at " .$email ;
        }
        $mailer->ClearAddresses();
        $mailer->ClearAttachments(); 
        

        // get new user's ID
        $results = query("SELECT LAST_INSERT_ID() AS id");
        $id = $results[0]["id"];

        
        // redirect to portfolio
       // redirect("index2.php");
    }
    else
    {
        // else render form
        render("register_form.php", array("title" => "Register"));
    }

?>
