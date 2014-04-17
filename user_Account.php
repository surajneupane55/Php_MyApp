<?php
class Account {

    function Account() {
        

        if (isset($_GET["account"])) {

            session_start();
            $this->display_menu();
            
            
        }
        else if(isset($_GET["profile"]))
        {
            session_start();
            $this->display_profile();
            

        }
 else if(isset($_GET["logout"]))
     {
     session_start();
     $this->log_outaccount();
 }
   
     
 }

    function display_menu() {
        if (isset($_GET["account"])) {
         $_SESSION['Account_menu'] = "True";
            header("Location: user_edit_account.php");
            
        }
        
    }
    function display_profile()
    {
        if(isset($_GET["profile"]))
        {
             $_SESSION['profile_detail'] = "True";
            header("Location:user_edit_account.php");     
            }
        



    }
    function log_outaccount()
    {
        if(isset($_GET["logout"]))
        { 
            session_destroy();
            header("Location: index.php");
           
        
    }

}
}

$account = new Account;
