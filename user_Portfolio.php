<?php
include("CRUD.php");
class Portfolio
{
	function Portfolio()
	{
		
		if(isset($_GET["value"]))
		{
			session_start();
                $this->get_all_user_portfolio();
			header("location:my_all_trade.php");

		}
		else
		{
			session_start();
			 $this->user_portfolio();
                         header("location:user_Index.php");

		}
        }

		function get_all_user_portfolio()
		{
			global $data;
			$data->get_all_user_portfolio();		
		}

		function user_portfolio()
		{
			global $data;
			$data->user_myMoney();
			$data->get_all_user_portfolio_count();
		}
	}
$portfolio= new Portfolio();

?>