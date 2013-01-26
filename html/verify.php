<?php
    require("../includes/config.php");
    

    
    if (isset($_GET["hash"]))
    {
            
        $hash = $_GET["hash"];

        if($hash === false)
        {
            apologize("Could not get hash from URL");
        }
        
        $check = query("SELECT * FROM users2 WHERE hash = ?", $hash);
        
        if ($check === false)
        {
            apologize("Could not find email address in our database.");
        }
        else
        {
            $check = $check[0];  
        }

        if ($check["active"] == 0)
        {
            $setActive = query("UPDATE users2 SET active = ? WHERE email = ? ", 1, $check["email"]);
            if ($setActive === false)
            {
                apologize("Could not activate user.");
            }
            
                        

            $_SESSION["id"] = $check["id"];

            $uploadpath = "uploads/" . $_SESSION["id"];
            
            if (!file_exists($uploadpath))
            {
                if(!mkdir($uploadpath, 0755))
                {
                    die("Could not create folder");
                } 
            }
            


            render("activated_form.php", array("title" => "Welcome to hSubs!"));

        }

        else
        {
            apologize("It looks like you've already activated your account!");
        }

        


    
    }

    else
    {
        render("verify_form.php", array("title" => "Verify"));
    }
    
?>

