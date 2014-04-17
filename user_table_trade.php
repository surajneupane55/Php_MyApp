<html lang="en">
    <head>
        <?php include 'bootstrap.php'; ?>
    </head>
    <body>
        <?php include 'user_tab.php'; ?>
        <div class="jumbotron">
            <div class="container"> 
                <div class="row">
                    <div class="col-sm-1">        
                        <a href="table.php?tech=true" class="list-group-item active">Tech</a>
                    </div>
                    <div class="col-sm-2">
                        <a href="table.php?finance=true" class="list-group-item active">Commodity</a>
                    </div>
                    <div class="col-sm-2">
                        <a href="table.php?market_capital=true" class="list-group-item active">E-com.</a>       
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr class="active">
                                    <td class="active">Ticker</td>
                                    <td class="success">Ask</td>
                                    <td class="warning">Bid</td>
                                    <td class="danger">Change</td>
                                    <td class="active">Chart</td>
                                    <td class="success">Buy</td>
                                </tr>
                                <?php
                                
                                           

                                            if ($_SESSION['tech'] === "True") {                                                
                                               
                                                $yql_base_url = "http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.quotes%20where%20symbol%20in%20(%22YHOO%22%2C%22AAPL%22%2C%22GOOG%22%2C%22FB%22%2C%22MSFT%22)&format=json&diagnostics=true&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=";
                                                 unset($_SESSION['tech']);
                                            } else if ($_SESSION['finance'] === "True") {
                                               
                                                $yql_base_url = "http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.quotes%20where%20symbol%20in%20(%22GOLD%22%2C%22OIL%22%2C%22SLV%22)&format=json&diagnostics=true&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=";
                                              unset($_SESSION['finance']);
                                            } else if ($_SESSION['market_capital'] === "True") {
                                                
                                                $yql_base_url = "http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.quotes%20where%20symbol%20in%20(%22TSLA%22%2C%22NFLX%22%2C%22AMZN%22%2C%22EBAY%22)&format=json&diagnostics=true&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=";
                                                 unset($_SESSION['market_capital']);
                                            }
                                            else
                                            {
                                                 $yql_base_url = "http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.quotes%20where%20symbol%20in%20(%22YHOO%22%2C%22AAPL%22%2C%22GOOG%22%2C%22FB%22%2C%22MSFT%22)&format=json&diagnostics=true&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=";
                                                 unset($_SESSION['tech']);
                                                
                                            }
                                            
                                            $session = curl_init($yql_base_url);
                                            curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
                                            $json = curl_exec($session);
                                            if (curl_error($session)) {
                                                die(curl_error($ch));
                                            }
                                            curl_close($session);
                                            $phpObj = json_decode($json);
                                            $_SESSION["trade_detail"] = $phpObj;
                                            if (!is_null($phpObj->query->results)) {
                                                foreach ($phpObj->query->results->quote as $quote) {
                                                    ?>  
                                                    <tr class="active">
                                                        <td class="active"><?php
                                                    echo $quotes .= $quote->symbol;
                                                    $chart = $quotes;
                                                    unset($quotes);
                                                    ?></td>
                                                        <td class="success"><?php echo $quotes .= $quote->Ask;
                                            unset($quotes);
                                                    ?></td>
                                                        <td class="warning"><?php echo $quotes .= $quote->Bid;
                                            unset($quotes);
                                                    ?></td>
                                                        <td class="danger"><?php echo $quotes .= $quote->Change;
                                                    unset($quotes);
                                                    ?></td>
                                                        <td class="info"><a href="charts.php?charts=http://chart.finance.yahoo.com/z?s=<?php echo $chart ?>&t=6m&q=l&l=on&z=s"</a><span class=" glyphicon glyphicon-signal"></td>
                                                        <td class="success"><a href="trade.php?value=<?php echo $chart ?>"><span class="glyphicon glyphicon-shopping-cart"></a></td>
                                                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                            </table>
                            
                        </div>
                    </div>
                    <div class="col-md-5">
                        <?php
                        if ($_SESSION['chart_status'] === "true") {
                            ?>
                            <div>
                                <img src="<?php echo $_SESSION['chart_img'] ?>" alt="chart_image" class="img-rounded">
                            </div>
                            <?php
                            unset($_SESSION['chart_status']);
                            unset($_SESSION['chart_img']);
                        }
                        ?>                       
                    </div>
                </div>
            </div>
        </div>








<?php include 'Footer.php'; ?>
    </body>






</html>
