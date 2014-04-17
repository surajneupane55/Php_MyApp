<?php
include_once("CRUD.php");
class Trade
{
	function Trade()
	{
		session_start();
		if(isset($_GET["value"]))
		{
			$this->ticker=$_GET["value"];
                        $this->trade_index();
                        $this->fetch_data();
                        header("Location:my_Portfolio.php");
			
		}

	}
        function trade_index()
        {
             $_SESSION["trade_ticker"]=$this->ticker;
        }
        function fetch_data()
        {
        	global $data;
        	$data->user_portfolio();
        }
}

$trade=new Trade;
?>
