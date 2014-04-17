<?php 
$yql_base_url = "http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.quotes%20where%20symbol%20in%20(%22YHOO%22%2C%22AAPL%22%2C%22GOOG%22%2C%22FB%22%2C%22TWTR%22)&format=json&diagnostics=true&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=";
$session = curl_init($yql_base_url);  
curl_setopt($session, CURLOPT_RETURNTRANSFER,true);      
$json = curl_exec($session);
if(curl_error($session))
{
    die(curl_error($ch));
}
curl_close($session);
$phpObj =  json_decode($json); 

    if(!is_null($phpObj->query->results)){  
      foreach($phpObj->query->results->quote as $quote){  
        $quotes .= "<div><h1>" . $quote->symbol . "</h2><p>";  
        $quotes .=  "<div><h2>" . $quote->Ask . "</h2><p>"."<br/>"; 
        echo $quotes;
         unset($quotes);
              
      }  
     
    }  


http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.quotes%20where%20symbol%20in%20(%22YHOO%22%2C%22AAPL%22%2C%22GOOG%22%2C%22MSFT%22)&format=json&diagnostics=true&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=
?>