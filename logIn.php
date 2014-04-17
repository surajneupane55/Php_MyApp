<?php
session_start();
include_once("form.php");
include_once("CRUD.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Learning Market</title>
        <?php include 'bootstrap.php'; ?>


    </head>
     
    <body>
        <div class="nav navbar-inverse nav-bar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="row">
                        <div class="col-md-3 col-md-offset-10">
                            <a class="navbar-text">LogIn<span class="glyphicon glyphicon-log-in"></span></a>
                        </div>
                    </div>
                </div>
                <div class="navbar-collapse collapse">
                    <form class="navbar-form navbar-right" id="logIn" name="logIn" action="logIn_Validation.php" method="post" role="form">
                        <div class="form-group">
                            <input placeholder="UserName" name="inputusername" id="inputusername" value='<?php echo $form->value("inputusername"); ?>' class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <input placeholder="Password" name="inputpassword" id="inputpassword" value='<?php echo $form->value("inputpassword"); ?>' class="form-control" type="password">
                        </div>
                        <button type="submit" name="form" class="btn btn-success">Sign In</button>
                    </form>
                </div><!--/.navbar-collapse -->
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-md-offset-3">
                    <div class="col-sm-5">
                        <span class="help-block text-center">
                            <?php
                            if ($form->num_errors > 0)
                                echo $form->num_errors . " Errors found in the form!!<br>";
                            else if (isset($_SESSION['message'])) {
                                echo $_SESSION['message'] . "<br>";
                                unset($_SESSION['message']);
                            }
                            ?>

                        </span>
                    </div>
                    <div class="col-sm-4">
                        <span class="help-block">
                            <?php echo $form->error("UserName"); ?>
                            <?php
                            if (isset($_SESSION['auth_user']))
                                $form->user_logInError();
                            unset($_SESSION['auth_user']);
                            ?>
                        </span>
                    </div>
                    <div class="col-sm-3">
                        <span class="help-block">
<?php echo $form->error("Password"); ?>
                        </span>
                    </div>
                </div>         
            </div>
        </div>
        <div class="jumbotron">
            <div class="container">

            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3"><img src="/Img/market.jpg" alt="market" class="img-rounded">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">

                    <blockquote class="blockquote-reverse">
                        <p>My father used to say that it's never too late to do anything you wanted to do. And he said, 'You never know what you can accomplish until you try.</p>
                        <footer> <cite title="Source Title">Michael Jordan</cite></footer>
                    </blockquote>

                </div>
            </div>              

        </div>
    </div>
</div>
<?php include 'Footer.php'; ?>


</body>
</html>


