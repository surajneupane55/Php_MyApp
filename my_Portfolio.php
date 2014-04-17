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
        <script>
            $(document).ready(function() {
                $('#totalButton').on('click', function() {
                    var inputTickerNum = parseFloat($('#inputtickernumber').val()),
                            inputTickerVal = parseFloat($('#inputtickervalue').text());
                    $('#amount').text("$" + (inputTickerNum * inputTickerVal).toFixed(2));
                })
                $('#inputtickernumber').on('keypress', function(e) {
                    if (e.which === 13) {
                        e.preventDefault();
                        $('#totalButton').click();
                    }
                })
            });
        </script>




        <div class="jumbotron">
            <div class="container"> 

                <div class="row">
                    <div class="col-md-4">  

                    </div>

                </div>
                <div class="row">
                    <div class="col-md-4">  

                    </div>

                </div>
                <div class="row">
                    <div class="col-md-4">                        
                    </div>
                    <div class="col-md-5">
                        <?php
                        if (!empty($_SESSION["trade_ticker"])) {
                            $phpObj = $_SESSION["trade_detail"];
                            $ticker = $_SESSION["trade_ticker"];
                            if (!is_null($phpObj->query->results)) {
                                foreach ($phpObj->query->results->quote as $quote) {
                                    if ($quote->symbol === $ticker) {
                                        ?>
                                        <form class="form-horizontal" role="form"  id="buy_stock" action="trade_quote.php" method="post">
                                            <div class="form-group">
                                                <label for="Number of Share" class="col-sm-4 control-label">Num. of Share</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" name="inputtickernumber" id="inputtickernumber"  placeholder="<?php echo $ticker ?>">
                                                    <input type="hidden" name="ticker_name" id="hiddenField" value="<?php echo $ticker ?>" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Price of each Share" class="col-sm-4 control-label">Price/share</label>
                                                <div class="col-sm-6">
                                                    <label for="Price of each Share" name="inputtickervalue1"id="inputtickervalue"class="col-sm-4 control-label"><?php if($quote->Ask>0){echo $quote->Ask;}else{echo"This quote is unaviable for trade now";} ?></label> 
                                                    <input type="hidden" name="inputtickervalue" id="hiddenField" value="<?php echo $quote->Ask; ?>" />
                                                </div>
                                            </div>
                                            <div class="form-group"> 
                                                <div class="col-sm-4">
                                                    <button type="button" id="totalButton" class="btn  btn-info">Calculate</button>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="Price of each Share" id="amount" class="col-sm-4 control-label"></label>
                                                </div>               
                                            </div> 
                                            <div class="form-group"> 
                                                <label for="Price of each Share" id="user_value_name" class="col-sm-4 control-label">Account Balance</label>              
                                                <div class="col-sm-6">
                                                    <label for="Total amount user have" id="user_value" class="col-sm-4 control-label"><?php echo "$" . $_SESSION["user_Balance"] ?></label>

                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" name="form1" class="btn btn-success">Like this Deal? Buy</button>
                                                </div>
                                            </div>
                                             </form> 
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <a type=button href='user_Index.php' class="btn btn-warning">Change this Quote? Go Back</a>
                                                </div>
                                            

                                       
                                        <?php
                                    }
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <?php Include 'Footer.php'; ?>


    </body>
</html>