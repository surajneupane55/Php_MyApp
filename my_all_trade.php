
<html lang="en">
    <head>

        <title>Learning Market</title>
        <?php
        include 'bootstrap.php';
        session_start();
        ?>
    </head>
    <body>

        <?php
        if (!empty($_SESSION['user_Name'])) {
            include 'user_tab.php';
        } else {
            header("Location: logIn.php");
        }
        ?>

        <?php
        if (!empty($_SESSION["all_user_portfolio_detail"])) {
            $all_user_portfolio_detail = $_SESSION["all_user_portfolio_detail"];
            $count = count($_SESSION["all_user_portfolio_detail"]);
            ?>
            <div class="jumbotron">
                <div class="container">
                    <div class="row text-center">
                        <h4><strong>My Portfolio</strong></h4>  
                    </div>
                    <div class="col-md-5">



                    </div>
                    <div class="col-md-5">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr class="active">
                                    <td class="active">Ticker</td>
                                    <td class="success">Price</td>
                                    <td class="warning">Date/Time</td>
                                    <td class="danger">Number</td>
                                    <td class="active">Status</td>
                                    <td class="success">Exit Position</td>
                                </tr>
                                <?php
                                for ($start = 0; $start <= $count - 1; $start++) {
                                    ?>
                                    <tr class="active">
                                        <td class="active"><?php echo $all_user_portfolio_detail[$start]["company_Name"]; ?></td>
                                        <td class="success"><?php echo $all_user_portfolio_detail[$start]["bought_Price"]; ?></td>
                                        <td class="warning"><?php echo $all_user_portfolio_detail[$start]["buy_TimeStamp"]; ?></td>
                                        <td class="danger"><?php echo $all_user_portfolio_detail[$start]["number_of_Share"]; ?></td>
                                        <td class="active"><?php
                                            $status = $all_user_portfolio_detail[$start]["status_Quote"];
                                            if ($status === "0") {
                                                echo"OPEN";
                                            } else
                                                echo"Closed";
                                            ?></td>
                                        <td class="success"><a href="position_Quote.php?value=<?php echo $all_user_portfolio_detail[$start]["portfolio_Id"]; ?>&currentprice=
                                            <?php
                                            $phpObj = $_SESSION["trade_detail"];
                                            if (!is_null($phpObj->query->results)) {
                                                foreach ($phpObj->query->results->quote as $quote) {
                                                    if ($quote->symbol === $all_user_portfolio_detail[$start]["company_Name"]) {
                                                        echo $quote->Ask;
                                                    }
                                                }
                                            }unset($phpObj)
                                            ?>"><?php
                                                                   if ($status === "0") {
                                                                       echo "DEAL";
                                                                   }
                                                                   ?></a>
                                        </td>
                                    </tr>        
                                <?php } ?>
                            </table> 
                            <div>
                                <ul>
                                    <li><a href='user_Index.php'><span class="glyphicon glyphicon-home"></span> Home</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <?php
                    }
                    else
                        { ?>
                         <div class="jumbotron">
                <div class="container">
                    <div class="row text-center">
                        <h4><strong>My Portfolio</strong></h4>  
                    </div>
                    <div class="col-md-5">
                        



                    </div>
                    <div class="col-md-5">
                      <strong>Hi there! Looks like your are afraid of market trend. No quote bought or sold so far.</strong>
                        <a type=button href='user_Index.php' class="btn btn-warning">Change this Quote? Go Back</a>
                    </div>
                    </div>
                    </div>
                        
                        
                       <?php
                       }
                    unset($all_user_portfolio_detail);
                    unset($_SESSION["all_user_portfolio_detail"]);
                    ?>
                </div>

            </div>
        </div>
    </body>
    <?php Include 'Footer.php'; ?>
</html>