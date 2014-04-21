<?php

include_once("CRUD.php");

class Edit_Process {

    function Edit_Process() {
        session_start();
        if (isset($_POST['form1']))
            $this->validateForm();
        header("Location: user_edit_account.php");
        
    }

    function validateForm() {


        global $data;

        $user_detail = $_SESSION["user_detail"];
        $count = count($user_detail) - 1;

        if (!empty($_POST['inputfirstname'])) {
            $firstname = $_POST['inputfirstname'];
        } else {
            $firstname = $user_detail[$count]['firstName'];
        }
        if (!empty($_POST['inputlastname'])) {
            $lastname = $_POST['inputlastname'];
        } else {
            $lastname = $user_detail[$count]['lastname'];
        }
       
        if (!empty($_POST['inputadress'])) {
            $address = $_POST['inputadress'];
        } else {
            $address = $user_detail[$count]['adress'];
        }
        if (!empty($_POST['inputcity'])) {
            $city = $_POST['inputcity'];
        } else {
            $city = $user_detail[$count]['city'];
        }
        if (!empty($_POST['inputzip'])) {
            $zip = $_POST['inputzip'];
        } else {
            $zip = $user_detail[$count]['zip'];
        }
        if (!empty($_POST['inputcountry'])) {
            $country = $_POST['inputcountry'];
        } else {
            $country = $user_detail[$count]['country'];
        }
        if (!empty($_POST['inputemail'])) {
            $email = $_POST['inputemail'];
        } else {
            $email = $user_detail[$count]['e_mail'];
        }


        global $data;
        $data->edit_User($firstname, $lastname, $address, $city, $zip, $country, $email);
        if ($data->status_edit_msg() === true) {
            $_SESSION["edit_user_message"] = " Profile Detail Updated";
            
        }
        
    }

}

$edit_process = new Edit_Process;
