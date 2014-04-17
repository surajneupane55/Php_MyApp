<?php
include_once("CRUD.php");
class Portfolio_Status
{
	function Portfolio_Status()
	{
		session_start();
		$this->quote_Id=$_GET["value"];
                $this->quote_price=$_GET["currentprice"];
                
		$this->quote_deal();
		header("Location: user_Index.php");
	}
	function quote_deal()
	{ 
		global $data;
		$data->close_position($this->quote_Id, $this->quote_price);
    }
}
$portfolio_status=new Portfolio_Status;
?>