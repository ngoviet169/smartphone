<!DOCTYPE html>
<html>
<head>
    <title></title>
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
                <a class="navbar-brand" href="index.php">SmartPhone Shop</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php?function=aboutus">About Us</a>
                    </li>
                    <li>
                        <a href="index.php?function=contact">Contact Us</a>
                    </li>
                </ul>

                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>

                <ul class="nav navbar-nav pull-right">
                    <li>
                        <a href="index.php?function=signup">Sign Up</a>
                    </li>
                    <li>
                        <a>
                            <span class ="glyphicon glyphicon-user"></span>
                            <?php 
                                if(isset($_SESSION['useradmin']))
                                    echo $_SESSION['useradmin'];
                                else
                                    echo '<a href="index.php?function=signin">Login</a>';
                             ?>
                        </a>
                    </li>

                    <li>
                        <a href="index.php?function=logout">Logout</a>
                    </li>
                    
                </ul>
            </div>


            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
</body>
</html>