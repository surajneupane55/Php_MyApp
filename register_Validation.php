<?php

include_once("form.php");
include_once("CRUD.php");

class Process {

    function Process() {
        session_start();
        if (isset($_POST['form1']))
            $this->validateForm();
    }

    function validateForm() {

        global $form;
        global $data;

        if (!empty($_POST['inputfirstname'])) {
            $firstname = $_POST['inputfirstname'];
        } else {
            $form->setError("FirstName", "First Name Required");
        }



        if (!empty($_POST['inputlastname'])) {
            $lastname = $_POST['inputlastname'];
        } 
        else{
            $form->setError("LastName", "User Name Required");

        }
        if (!empty($_POST['inputusername'])&&strlen($_POST['inputusername'])>=5) {
            $username = $_POST['inputusername'];
        } 
        else if (strlen($_POST['inputusername'])<5&&strlen($_POST['inputusername'])>1){
            $form->setError("UserName", "Must be more than 5 character");
        }
        else {
            $form->setError("UserName", "User Name Required");
        }
        if (!empty($_POST['inputpassword'])) {
            $password = $_POST['inputpassword'];
        } else {
            $form->setError("Password", "Password Required");
        }
        if (!empty($_POST['inputrepeatpassword']) && $_POST['inputrepeatpassword'] === $password) {
            $repeatpassword = $_POST['inputrepeatpassword'];
        } else if ($repeatpassword != $password) {
            $form->setError("Repeatpassword", "Password doesn't match");
        } else {
            $form->setError("Repeatpassword", "Repeat Password Required");
        }

        if (!empty($_POST['inputadress'])) {
            $address = $_POST['inputadress'];
        } else {
            $form->setError("Address", "Address Required");
        }
        if (!empty($_POST['inputcity'])) {
            $city = $_POST['inputcity'];
        } else {
            $form->setError("City", "City Required");
        }
        if (!empty($_POST['inputzip'])) {
            $zip = $_POST['inputzip'];
        } else {
            $form->setError("Zip", "Zip  Required");
        }


        if (!empty($_POST['inputcountry'])) {
            $country = $_POST['inputcountry'];
        } else {
            $form->setError("Country", "Country  Required");
        }

        if (!empty($_POST['inputemail'])) {
            $email = $_POST['inputemail'];
        } else {
            $form->setError("Email", "Email  Required");
        }

        if ($form->num_errors > 0) {
            $_SESSION['value_array'] = $_POST;
            $_SESSION['error_array'] = $form->getErrorArray();
            header("Location: register_Html.php");
        } else 
            {
            $data->create_User($firstname, $lastname, $username, $password, $address, $city, $zip, $country, $email);
            if ($data->status_msg() === true) 
                {
                    $data->authenticate_User($username, $password);
                if ($data->authenticate_msg() === true)
                    {

                $user_array = $data->user_info();
                 $_SESSION["user_detail"]= $user_array;
                 $user_Id=$user_array[0]['userId'];
                $data->account_value($user_Id);
               
                $user_Name=$user_array[0]['userName'];
                $_SESSION['user_Name']= $user_Name;
                header("Location: user_Index.php");
            } 
           
            else 
                {
                $_SESSION['reg_user'] = "Fails";
                header("Location: register_Html.php");
            }
        }
        }
    }

}
$process = new Process;
