<?php
class Chart
{
function Chart()
{
	if(isset($_GET["charts"]))
	{
		session_start();
		$this->chart_value=$_GET["charts"];
		$this->display_chart();
                header("Location: user_table_trade.php");
	}
}
	function display_chart()
	{
		$_SESSION['chart_img']=$this->chart_value;
                $_SESSION['chart_status']="true";
                
	}






}



$chart=new Chart;

