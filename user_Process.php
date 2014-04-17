
<?php



class User_Process {

	function User_Process() {
             session_start();
            if(empty( $_SESSION["valid_user"]))
            {
                header("Location:index.php");
                
            }
            
             if (isset($_GET["account"])) {
		
                

		$this->display_menu();
	}
        }

	function display_menu() 
	{       
		if($_SESSION['Account_menu'] === "True")

		{
			return true;
		}
		
	}
	function profile_detail() 
	{
		if($_SESSION['profile_detail'] === "True")

		{
			return $_SESSION['user_detail'];
		}
		
	}

}

$user_Process = new User_Process;
