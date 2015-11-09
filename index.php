<?php
session_start();
if (isset($_GET['LogOut'])) {
    session_destroy ();
    header("Location: login.php");
}
if ( ! isset( $_SESSION['is_logged'] ) || $_SESSION['is_logged'] != 1 )
{
    header("Location: login.php");
}

include('tweets.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <style>
    
    .limit {
        color: red;
    }
    
    </style>

    <title>Blog Post - Start Bootstrap Template</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/blog-post.css" rel="stylesheet">
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Start Bootstrap</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>

                </ul>
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="?LogOut"><span class="glyphicon glyphicon-log-in"></span>LogOut</a></li>
                  </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
                <div class="well">
                    <form id="addTweetForm" action="add.php" method="POST" role="form">
                        <div class="form-group">
                            <textarea id="tweetTextarea" test="test123" class="form-control" rows="3" name="content" placeholder="What's happening?"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Tweet</button>
                        <div id="counter" style="float: right">
                            დარჩენილი სიმბოლოები: <span id="charactersLeft">140</span>
                        </div>
                    </form>
                </div>
                
                <div id="newTweets">
                    <?php foreach ( $tweets as $tweet ) : ?>
                    <div class="media" data-id="<?php echo $tweet['id']; ?>">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $tweet['username']; ?>
                                <small><?php echo $tweet['date']; ?></small>
                            </h4>
                            <?php echo $tweet['content']; ?>
                        </div>
                    </div>
                    <hr>
                    <?php endforeach; ?>
                </div>    
                
                <!-- Blog Post -->
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>
            </div>

        </div>
        <!-- /.row -->

        <hr>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/script.js"></script>

</body>
</html>