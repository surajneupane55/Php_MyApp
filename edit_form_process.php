<?php

class Edit_form_process {

    function Edit_form_process() {

        if (isset($_GET['edit_usr'])) {
            session_start();
            $this->display_form();
                        
        }
    }
    function display_form() 
    {
        if ($_SESSION['edit_usr'] === "True"){
        
        return true;
        }
    	                      
    }  

}
$edit_form_process = new Edit_form_process;

?>

