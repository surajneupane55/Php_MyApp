<?php

class Market_Table
{
    function Market_Table()
     {
        session_start();
          if(isset($_GET["tech"]))
          {
               $this->tech_table();
               header("Location: user_table_trade.php");
          }
          else if(isset($_GET["finance"]))
               {
               $this->finance_table();
               header("Location: user_table_trade.php");
          }
          else if(isset($_GET["market_capital"]))
          {
               
               $this->cap_goods_table();
               header("Location: user_table_trade.php");
         
          }
          

    }
function tech_table()
{
if(isset($_GET["tech"]))
{
$_SESSION['tech'] ="True";

}
}
function finance_table()
{
if(isset($_GET["finance"]))
{

$_SESSION['finance'] ="True";

}

}
function cap_goods_table()
{
if(isset($_GET["market_capital"]))
{

$_SESSION['market_capital'] ="True";

}
}

}
$market_table = new Market_Table;

?>