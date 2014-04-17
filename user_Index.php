<?php
session_start();
include_once("user_Process.php");
include_once("edit_user.php");
include_once("edit_form_process.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Learning Market</title>
        <?php include 'bootstrap.php'; ?>
    </head>
    <body>
        <?php
        if (!empty($_SESSION['user_Name'])) {
            Include 'user_tab.php';
        } else {
            header("Location: logIn.php");
        }
        ?>


        <div class="jumbotron">
            <div class="container"> 
                <div class="row">
                    <div class="alert alert-warning">You can trade different company with this topic</div>
                </div>
                <div class="row">

                    <div class="col-sm-3">        
                        <a href="table.php?tech=true" class="list-group-item active">Tech</a>
                    </div>
                    <div class="col-sm-3">
                        <a href="table.php?finance=true" class="list-group-item active">Commodity</a>
                    </div>
                    <div class="col-sm-3">
                        <a href="table.php?market_capital=true" class="list-group-item active">E-commerce</a>       
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="table-responsive">
                            <div class="panel panel-default">
                                <!-- Default panel contents -->
                                <div class="panel-heading"></div>
                                <div class="panel-heading">What we offer:</div>
                                <div class="panel-body">
                                    <ul class="list-group">
                                        <li class="list-group-item list-group-item-success">Measure Your Results</li>
                                        <li class="list-group-item list-group-item-success">Keep A Trading Log</li>
                                        <li class="list-group-item list-group-item-success">Manage Online Trading Risk</li>
                                        <li class="list-group-item list-group-item-success">Online trading education</li>
                                        <li class="list-group-item list-group-item-success">Real time scenario</li>
                                    </ul>

                                </div>

                            </div>
                        </div>
                       

                        
                    </div>
                     <div class="col-md-5">

                             

                            <?php
                            if (!empty($_SESSION["insert_quote"]) && $_SESSION["insert_quote"] === success) {
                                ?>
                                <h4 text-center><strong>Successfully bought a stock! Check My portfolio for detail</strong></h4>
                                <?php
                            }
                            unset($_SESSION["insert_quote"])
                            ?>
                            <?php
                            if (!empty($_SESSION["user_Balance_Message"])) {
                                ?>
                                <h4 text-center><strong><?php echo $_SESSION["user_Balance_Message"] ?></strong></h4>

                            <?php } unset($_SESSION["user_Balance_Message"]) ?>



                            <?php
                            if (!empty($_SESSION["all_user_portfolio_count"]) && ($_SESSION["user_myMoney"])) {
                                ?>
                                <h4 text-center><strong><?php echo "You have started with 10000 usd" ?></strong></h4>

                                <?php
                                if (count($_SESSION["all_user_portfolio_count"]) <= 0) {
                                    ?>
                                    <h4 text-center><strong><?php echo "You have not traded single stock so far" ?></strong></h4>
                                    <?php
                                } else {
                                    ?>
                                    <h4 text-center><strong> <?php echo 'You have traded ' . count($_SESSION["all_user_portfolio_count"]) . ' number of stock' ?></strong></h4>
                                <?php } ?>
                                <h4 text-center><strong> <?php echo"Current balance in your account is " . $_SESSION["user_myMoney"] ?></strong></h4>
                                <?php
                            }

                            unset($_SESSION["user_myMoney"]);
                            unset($_SESSION["all_user_portfolio_count"]);
                            ?>
                        </div>
                    <div class="col-md-6">
                            <?php if(isset($_SESSION["trade_possible"])||(isset($_SESSION["trade_no_possible"])))
                            { ?>
                             <strong>Hi there! Looks like your  quote cannot be proceed further either buying price is unavailable or num.of stock is not specified.</strong>
                          <?php unset($_SESSION["trade_possible"]); unset($_SESSION["trade_no_possible"]); } ?>
                           
                            
                               
                            
                                  
                        </div>
                </div>
            </div>
            <div class="btn-group">
                <li><a href="#About" data-toggle="modal"></a>
                </li>
            </div> 
            <?php include 'Footer.php'; ?>

    </body>
</html>
