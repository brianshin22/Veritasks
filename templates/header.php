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
        <script src="js/bootstrap.js"></script>
        <script src="js/scripts.js"></script>
        <script src="js/jquery.dataTables.js"></script>
        <script src="js/bootstrapDatatables.js"></script>
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
                                  <li <?=echoActiveClassIfRequestMatches("about")?>>
                                    <a href="about.php">About</a></li>
                                  <li class="divider-vertical"></li>
                                  <li <?=echoActiveClassIfRequestMatches("index")?>>
                                    <a href="availableProperties.php">Available Properties</a></li>
                                  <li class="divider-vertical"></li>
                                 
                                </ul>
                                <a class="btn pull-right" id="addproperty" href="addProperty.php">Add a property</a>
                                <a class="btn pull-right" id="logout" style="margin-right:5px" href="logout.php">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="middle">



