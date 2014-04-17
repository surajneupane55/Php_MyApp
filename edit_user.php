<?php

class Edit {

    function Edit() {

        if (isset($_GET['edit_usr'])) {
            session_start();
            $this->display_form();
              header("Location: edit_user_profile.php");
                        
        }
    }
    function display_form() 
    {
        
        $_SESSION['edit_usr'] = "True";
    	                      
    }  

}
$edit = new Edit;

?>