<?php
    require("../includes/config.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $email = $_POST["email"];
        $pass = $_POST["password"];
        $verify = $_POST["verify"];
        
        // validate inputs
        if (empty($email))
        {
            apologize("Please enter an email.");
        }
        else if (empty($pass))
        {
            apologize("Please enter your password.");
        }
        else if (empty($verify))
        {
            apologize("Please enter the verification code that was sent your email address.");
        }
        
        $check = query("SELECT * FROM users2 WHERE email = ?", $email);

        if ($check === false)
        {
            apologize("Could not find email address in our database.");
        }
        else
        {
            $check = $check[0];  
        }

        if ($verify === $check["hash"])
        {
            $setActive = query("UPDATE users2 SET active = ? WHERE email = ? ", 1, $email);
            if ($setActive === false)
            {
                apologize("Could not activate user.");
            }
            
                        

            $_SESSION["id"] = $check["id"];

            $uploadpath = "uploads/" . $_SESSION["id"];
            
            if(!mkdir($uploadpath, 0755))
            {
                die("Could not create folder");
            } 


            render("activated_form.php", array("title" => "Welcome to hSubs!"));

        }

        else
        {
            apologize("Sorry, wrong verification code. Check your email again.");
        }

        



    }

    else
    {
        render("verify_form.php", array("title" => "Verify"));
    }
    
?>

