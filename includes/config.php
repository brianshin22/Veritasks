<?php
    // display errors, warnings, and notices
    ini_set("display_errors", true);
    error_reporting(E_ALL);

    // requirements
    require("constants.php");
    require("functions.php");

    // enable sessions
    session_start();

    // require authentication for most pages
    if (!preg_match("{(?:login|logout|register|about|verify)\.php$}", $_SERVER["PHP_SELF"]))
    {
        if (empty($_SESSION["id"]))
        {
            redirect("about.php");
        }
    }

      // Email Settings
    $site['from_name'] = 'hSub'; // from email name
    $site['from_email'] = 'webmaster@hsub.com'; // from email address
 
    // Just in case we need to relay to a different server,
    // provide an option to use external mail server.
    $site['smtp_mode'] = 'disabled'; // enabled or disabled
    $site['smtp_host'] = null;
    $site['smtp_port'] = null;
    $site['smtp_username'] = null;

?>
