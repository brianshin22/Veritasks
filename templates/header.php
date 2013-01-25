<!DOCTYPE html>

<html>

    <head>

        <link href="css/bootstrap.css" rel="stylesheet"/>
        <link href="css/bootstrap-responsive.css" rel="stylesheet"/>
        <link href="css/styles.css" rel="stylesheet"/>
        <link href="css/jquery.dataTables.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>Harvard Sublets: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Harvard Sublets</title>
        <?php endif ?>

        <?php 
        function echoActiveClassIfRequestMatches($requestUri)
        {
            $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

            if ($current_file_name == $requestUri)
                echo 'class="active"';
        }
       
        ?>
        
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="js/jquery-ui-1.10.0.custom.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/scripts.js"></script>
        <script type="text/javascript" src="//api.filepicker.io/v1/filepicker.js"></script>
        <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZPTmI4HVNMCeQq9DqSf0iKe59KV8Aggw&sensor=false">
        </script>
        
        <?php
        if (empty($_SESSION["id"]))
        {
            echo '<script src="js/changeNavbar.js"></script>';
        }
        ?>
    </head>

    <body>
			<div id="top">
                <div class="container">
                    <div class="navbar-outer">
                        <div class="navbar">
                            <div class="navbar-inner">
                                <a class="brand" id= "logo" href="index.php">hSub</a>
                                <ul class="nav">
                                  <li class="divider-vertical"></li>
                                  <li <?=echoActiveClassIfRequestMatches("availableProperties")?>>
                                    <a href="availableProperties.php">Available Properties</a></li>
                                  <li class="divider-vertical"></li>
                                  
                                  <?php
                                    
                                    if(isset($_SESSION["propertyid"])) 
                                    {
                                        
                                            echo '<li '; 
                                            echoActiveClassIfRequestMatches("updateListing");
                                            echo '>';
                                            echo '<a href="updateListing.php">Edit Your Listing</a></li>';
                                            echo '<li class="divider-vertical"></li>';

                                    }                                                                               
                                  ?>


                                 
                                </ul>
                                <a class="btn pull-right" id="logout2"  href="logout.php">Logout</a>
                                <a class="btn pull-right" id="addproperty2" style="margin-right:5px" href="addProperty.php">Add a listing</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="middle">



