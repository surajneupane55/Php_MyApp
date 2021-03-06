<?php

class Form {

    var $values = array();
    var $errors = array();
    var $num_errors;

    function Form() {
        if (isset($_SESSION['value_array']) && isset($_SESSION['error_array'])) {
            $this->values = $_SESSION['value_array'];
            $this->errors = $_SESSION['error_array'];
            $this->num_errors = count($this->errors);
            unset($_SESSION['value_array']);
            unset($_SESSION['error_array']);
        } else
            $this->num_errors = 0;
    }

    /* function setValue($field, $value)
      {
      $this->values[$field] = $value;
      } */

    function setError($field, $errmsg) {
        $this->errors[$field] = $errmsg;
        $this->num_errors = count($this->errors);
    }

    function value($field) {
        if (array_key_exists($field, $this->values))
            return htmlspecialchars(stripslashes($this->values[$field]));
        else
            return "";
    }

    function error($field) {
        if (array_key_exists($field, $this->errors))
            return "<font color=\"#ff0000\">" . $this->errors[$field] . "</font>";
        else
            return "";
    }

    function getErrorArray() {
        return $this->errors;
    }

    function user_logInError() { {
            echo "Either  UserName or Password is error!!";
        }
    }

    function user_registerError() { {
            echo"Registration Attempt Fail!!";
        }
    }

   
        
   
}

$form = new Form;

