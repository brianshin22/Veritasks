<!DOCTYPE html>

<html>

    <head>

        <link href="css/bootstrap.css" rel="stylesheet"/>
        <link href="css/bootstrap-responsive.css" rel="stylesheet"/>
        <link href="css/styles.css" rel="stylesheet"/>
        <link href="css/jquery.dataTables.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>Veritasks: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Veritasks</title>
        <?php endif ?>

        <?php 
        function echoActiveClassIfRequestMatches($requestUri)
        {
            $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

            if ($current_file_name == $requestUri)
                echo 'class="active"';
        }
        ?>
        
        <script src="js/jquery-1.8.2.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/scripts.js"></script>
        <script src="js/jquery.dataTables.js"></script>
        <script src="js/bootstrapDatatables.js"></script>
    </head>

    <body>

        <div class="container-fluid">

            <div id="top">
                <h3></h3>
                <div class="navbar navbar-inverse navbar-fixed-top">
                    <div class="navbar">
                        <div class="navbar-inner">
                            <a class="brand" id= "logo" href="index.php">Veritasks</a>
                            <ul class="nav">
                              <li <?=echoActiveClassIfRequestMatches("about")?>>
                                <a href="about.php">About</a></li>
                              <li class="divider-vertical"></li>
                              <li <?=echoActiveClassIfRequestMatches("index")?>>
                                <a href="index.php">Available Tasks</a></li>
                              <li class="divider-vertical"></li>
                              <li <?=echoActiveClassIfRequestMatches("createTask")?>>
                                <a href="createTask.php">Create Task</a></li>
                              <li class="divider-vertical"></li>
                              <li <?=echoActiveClassIfRequestMatches("taskCompletionHistory")?>>
                                <a href="taskCompletionHistory.php">Completed Tasks</a></li>
                              <li class="divider-vertical"></li>
                              <li <?=echoActiveClassIfRequestMatches("createdTasks")?>>
                                <a href="createdTasks.php">Created Tasks</a></li>
                              <li class="divider-vertical"></li>
                            </ul>
                            <div id="logout">
                                <a class="btn btn-primary pull-right" href="logout.php">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="middle">


