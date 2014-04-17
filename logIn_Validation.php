<?php

include_once("form.php");
include_once("CRUD.php");

class Process {

    function Process() {
        session_start();
        if (isset($_POST['form']))
            $this->validateForm();
    }

    function validateForm() {
        global $form;
        global $data;

        if (!empty($_POST['inputusername'])) {
            $username = $_POST['inputusername'];
        } else {
            $form->setError("UserName", "User Name Required");
        }
        if (!empty($_POST['inputpassword'])) {
            $password = $_POST['inputpassword'];
        } else {
            $form->setError("Password", "Password Required");
        }
        if ($form->num_errors > 0) {
            $_SESSION['value_array'] = $_POST;
            $_SESSION['error_array'] = $form->getErrorArray();
            header("Location: logIn.php");
        } else {
            $data->authenticate_User($username, $password);


            if ($data->authenticate_msg() === true) {
                $user_array = $data->user_info();
            $_SESSION["user_detail"]= $user_array;

                $user_Name = $user_array[0]['userName'];
                $_SESSION['user_Name'] = $user_Name;
                header("Location: user_Index.php");
            } else {
                $_SESSION['auth_user'] = "Fails";
                header("Location: logIn.php");
            }
        }
    }

}

$process = new Process;
