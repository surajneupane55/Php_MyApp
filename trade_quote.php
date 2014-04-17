<?php
include_once("CRUD.php");
class Quote
{
	function Quote()
	{
		session_start();
		$this->company_name=$_POST["ticker_name"];
               
		$this->bought_value=$_POST["inputtickervalue"];
               if($this->bought_value<1){ $_SESSION["trade_possible"]="false";}
                 
		$this->num_of_share=$_POST["inputtickernumber"];
                 if($this->num_of_share<1) {$_SESSION["trade_no_possible"]="true";}
                if(empty($_SESSION["trade_possible"])&(empty($_SESSION["trade_no_possible"])))
              
                {
		$this->my_quote();
                }
                else {
                header("Location: user_Index.php");
                }
                header("Location: user_Index.php");
	}
	function my_quote()
	{ 
            
		global $data;
		$data->insert_quote($this->company_name,$this->bought_value,$this->num_of_share);
                $data->change_balance($this->bought_value,$this->num_of_share);
	}
}
$quote=new Quote;
?>