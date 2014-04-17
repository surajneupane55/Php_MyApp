<?php
include_once 'function.php';

class data {

    var $message;
    var $message1;
    var $username;
    var $sth;
    var $token;
    var $email;
    var $firstname;
    var $lastname;
    var $address;
    var $zip;
    var $city;
    var $country;
    var $salt1 = 0451316;
    var $salt2 = "suraj";
    var $dbh;
    var $user;
    var $userId;
    var $user_portfolio;

    //inserting user into database

    function create_User($firstname, $lastname, $username, $password, $address, $city, $zip, $country, $email) {
        global $dbh;
        $this->password = $password;
        $this->dbh = $dbh;
        $this->sth = $dbh->prepare('CALL sp_insertUser(?,?,?,?,?,?,?,?,?)');
        $this->sth->bindParam(1, $this->username = $username, PDO::PARAM_STR);
        $this->sth->bindParam(2, $this->token = md5($this->salt1 . $this->password . $this->salt2), PDO::PARAM_STR);
        $this->sth->bindParam(3, $this->email = $email, PDO::PARAM_STR);
        $this->sth->bindParam(4, $this->firstname = $firstname, PDO::PARAM_STR);
        $this->sth->bindParam(5, $this->lastname = $lastname, PDO::PARAM_STR);
        $this->sth->bindParam(6, $this->address = $address, PDO::PARAM_STR);
        $this->sth->bindParam(7, $this->zip = $zip, PDO::PARAM_INT);
        $this->sth->bindParam(8, $this->city = $city, PDO::PARAM_STR);
        $this->sth->bindParam(9, $this->country = $country, PDO::PARAM_STR);
        if ($this->sth->execute()) {
            $this->message = true;
        } else {
            $this->message = false;
        }
    }

    function status_msg() {
        if ($this->message) {
            return true;
        } else {
            return false;
        }
    }

    function authenticate_User($username, $password) {
        global $dbh;
        $this->dbh = $dbh;
        $this->username = $username;
        $this->passwords = $password;
        $password = md5($this->salt1 . $this->passwords . $this->salt2);
        $this->sth = $this->dbh->prepare('SELECT * From User u
         INNER JOIN user_Detail d
         ON (u.userId=d.userId)
         WHERE u.userName=:username AND u.passWord=:password');
        $this->sth->bindParam(':username', $this->username, PDO::PARAM_STR);
        $this->sth->bindParam(':password', $password, PDO::PARAM_STR, 50);
        $this->sth->execute();
        $this->user= $this->sth->fetchAll();
    }

    function authenticate_msg() {
        if (empty($this->user)) {
            return False;
        } else {
            $_SESSION["valid_user"]="true";
            return True;
        }
    }

    function user_info()
    {
        return ($this->user);
    }
    
    
    function edit_user($firstname, $lastname, $username, $address, $city, $zip, $country, $email)
    {
        global $dbh;
        $user_detail=$_SESSION["user_detail"];
        $count=count($user_detail)-1;
        $userId=$user_detail[$count]['userId'];
        $token=$user_detail[$count]['passWord'];

        $this->dbh = $dbh;

        $this->sth = $dbh->prepare('CALL sp_edit_user_Detail_procedure(?,?,?,?,?,?,?,?,?)');
        $this->sth->bindParam(1, $this->username = $username, PDO::PARAM_STR);
        $this->sth->bindParam(2, $this->userId =$userId, PDO::PARAM_STR);
        $this->sth->bindParam(3, $this->email = $email, PDO::PARAM_STR);
        $this->sth->bindParam(4, $this->firstname = $firstname, PDO::PARAM_STR);
        $this->sth->bindParam(5, $this->lastname = $lastname, PDO::PARAM_STR);
        $this->sth->bindParam(6, $this->address = $address, PDO::PARAM_STR);
        $this->sth->bindParam(7, $this->zip = $zip, PDO::PARAM_INT);
        $this->sth->bindParam(8, $this->city = $city, PDO::PARAM_STR);
        $this->sth->bindParam(9, $this->country = $country, PDO::PARAM_STR);
        if ($this->sth->execute()) {
            $this->message = true;
            $this->updated_user($this->username,$token);
            unset( $_SESSION["user_detail"]);
            $_SESSION["user_detail"] =$this->user;
        } else {
            $this->message = false;
        }
        
    }

    function updated_user($username,$token)
    {
       global $dbh;
       $this->dbh = $dbh;
       $this->username = $username;
       $password =  $token;
       $this->sth = $this->dbh->prepare('SELECT * From User u
         INNER JOIN user_Detail d
         ON (u.userId=d.userId)
         WHERE u.userName=:username AND u.passWord=:password');
       $this->sth->bindParam(':username', $this->username, PDO::PARAM_STR);
       $this->sth->bindParam(':password', $password, PDO::PARAM_STR, 50);
       $this->sth->execute();
       $this->user= $this->sth->fetchAll();


   }
   function status_edit_msg()
   {
    if($this->message===true)
    {
        return true;
    }
}

function account_value($user_Id)
{
    global $dbh;
    $this->dbh = $dbh;
    $userId=$user_Id;
    $account_balance=10000;
    $profit_loss=0;
    $this->sth = $dbh->prepare('CALL sp_user_Status_procedure(?,?,?)');
    $this->sth->bindParam(1,$userId, PDO::PARAM_STR);
    $this->sth->bindParam(2,$account_balance, PDO::PARAM_STR);
    $this->sth->bindParam(3,$profit_loss, PDO::PARAM_STR);           
    if ($this->sth->execute()) {
        $this->message = true;
    } else {
        $this->message = false;
    }
}
function user_portfolio()
{
    global $dbh;
    $this->dbh = $dbh;
    $user_detail=$_SESSION["user_detail"];
    $count=count($user_detail)-1;
    $userId=$user_detail[$count]['userId'];
    $this->sth = $this->dbh->prepare('SELECT user_Balance From user_Status s
      WHERE s.userId=:userId');
    $this->sth->bindParam(':userId', $userId, PDO::PARAM_STR);
    $this->sth->execute();
    $this->user_portfolio= $this->sth->fetchAll();

    $balance_detail=$this->user_portfolio;
    $_SESSION["user_Balance"]= $balance_detail[0]['user_Balance'];

}
function user_myMoney()
{
    global $dbh;
    $this->dbh = $dbh;
    $user_detail=$_SESSION["user_detail"];
    $count=count($user_detail)-1;
    $userId=$user_detail[$count]['userId'];
    $this->sth = $this->dbh->prepare('SELECT user_Balance From user_Status s
      WHERE s.userId=:userId');
    $this->sth->bindParam(':userId', $userId, PDO::PARAM_STR);
    $this->sth->execute();
    $this->user_portfolio= $this->sth->fetchAll();

    $balance_detail=$this->user_portfolio;
    $_SESSION["user_myMoney"]= $balance_detail[0]['user_Balance'];

}
function insert_quote($company_name,$bought_value,$num_of_share)
{
    global $dbh;
    $this->dbh = $dbh;
    $user_detail=$_SESSION["user_detail"];
    $count=count($user_detail)-1;
    $userId=$user_detail[$count]['userId'];
    $this->user_portfolio(); 
    if($_SESSION["user_Balance"]<($bought_value*$num_of_share))
    {
        $_SESSION["user_Balance_Message"]="Ouch! you don't have enough balance to proceed this quote";

    }
    else
    {
        $this->sth = $dbh->prepare('CALL sp_insert_portfolio(?,?,?,?)');
        $this->sth->bindParam(1, $company_name, PDO::PARAM_STR);
        $this->sth->bindParam(2,  $num_of_share, PDO::PARAM_INT);
        $this->sth->bindParam(3,  $bought_value, PDO::PARAM_STR);
        $this->sth->bindParam(4,  $userId, PDO::PARAM_STR);
        if ($this->sth->execute()) 
            {$_SESSION["insert_quote"]="success";}
        else
            {$_SESSION["insert_quote"]="unsuccessful";}
    }



}
function  change_balance($bought_value,$num_of_share)
{
 global $dbh;
 $this->dbh = $dbh;
 $user_detail=$_SESSION["user_detail"];
 $count=count($user_detail)-1;
 $userId=$user_detail[$count]['userId'];
 $this->user_portfolio();           
 $user_Balance=$_SESSION["user_Balance"]-($bought_value*$num_of_share);

 $this->sth = $this->dbh->prepare('UPDATE user_Status SET user_Balance=:user_Balance
  WHERE userId=:userId');
 $this->sth->bindParam(':userId', $userId, PDO::PARAM_STR);
 $this->sth->bindParam(':user_Balance', $user_Balance, PDO::PARAM_STR);
 $this->sth->execute();


}
function get_all_user_portfolio()
{
   global $dbh;
   $this->dbh = $dbh;
   $user_detail=$_SESSION["user_detail"];
   $count=count($user_detail)-1;
   $userId=$user_detail[$count]['userId'];
   $this->sth = $this->dbh->prepare('SELECT * From portfolio p
      WHERE p.userId=:userId');
   $this->sth->bindParam(':userId', $userId, PDO::PARAM_STR);
   $this->sth->execute();
   $this->all_user_portfolio= $this->sth->fetchAll();


   $all_user_portfolio_detail=$this->all_user_portfolio;
   $_SESSION["all_user_portfolio_detail"]= $all_user_portfolio_detail;

} 
function get_all_user_portfolio_count()
{
   global $dbh;
   $this->dbh = $dbh;
   $user_detail=$_SESSION["user_detail"];
   $count=count($user_detail)-1;
   $userId=$user_detail[$count]['userId'];
   $this->sth = $this->dbh->prepare('SELECT * From portfolio p
      WHERE p.userId=:userId');
   $this->sth->bindParam(':userId', $userId, PDO::PARAM_STR);
   $this->sth->execute();
   $this->all_user_portfolio= $this->sth->fetchAll();


   $all_user_portfolio_detail=$this->all_user_portfolio;
   $_SESSION["all_user_portfolio_count"]= $all_user_portfolio_detail;

} 
function close_position($quote_Id,$current_price)
{
    global $dbh;
    $this->dbh = $dbh;
    $this->sth = $this->dbh->prepare('SELECT * From portfolio p
      WHERE p.portfolio_Id=:quote_id');
    $this->sth->bindParam(':quote_id', $quote_Id, PDO::PARAM_STR);
    $this->sth->execute();
    $this->all_user_portfolio= $this->sth->fetchAll();
    $all_user_portfolio_detail=$this->all_user_portfolio;
    $bought_Price=$all_user_portfolio_detail[0]['bought_Price'];
    $company_name=$all_user_portfolio_detail[0]['company_Name'];
    $number_of_Share=$all_user_portfolio_detail[0]['number_of_Share'];
    $userId=$all_user_portfolio_detail[0]['userId'];
    $total_past_value=$bought_Price*$number_of_Share;
    
$last_price=$current_price*$number_of_Share;
 if(($current_price-$bought_Price)>=0)
 {
    $profit=$last_price-$total_past_value;
    $this->sth = $this->dbh->prepare('UPDATE user_Status SET user_Balance=user_Balance+:last_price
      WHERE userId=:userId');
    $this->sth->bindParam(':userId', $userId, PDO::PARAM_STR);
    $this->sth->bindParam(':last_price', $last_price, PDO::PARAM_STR);
    $this->sth->execute();
    $this->sth = $this->dbh->prepare('UPDATE user_Status SET user_profit_Loss=user_profit_Loss+:profit
      WHERE userId=:userId');
    $this->sth->bindParam(':userId', $userId, PDO::PARAM_STR);
    $this->sth->bindParam(':profit', $profit, PDO::PARAM_STR);
    $this->sth->execute();

}
else
{
    $loss=$total_past_value-$last_price;
    $this->sth = $this->dbh->prepare('UPDATE user_Status SET user_Balance=user_Balance+:last_price
      WHERE userId=:userId');
    $this->sth->bindParam(':userId', $userId, PDO::PARAM_STR);
    $this->sth->bindParam(':last_price', $last_price, PDO::PARAM_STR);
    $this->sth->execute();
    $this->sth = $this->dbh->prepare('UPDATE user_Status SET user_profit_Loss=user_profit_Loss-:loss
      WHERE userId=:userId');
    $this->sth->bindParam(':userId', $userId, PDO::PARAM_STR);
    $this->sth->bindParam(':loss', $loss, PDO::PARAM_STR);
    $this->sth->execute();
}
$this->sth = $this->dbh->prepare('UPDATE portfolio SET status_Quote=1
  WHERE portfolio_Id=:quote_Id');
$this->sth->bindParam(':quote_Id',$quote_Id , PDO::PARAM_STR);
$this->sth->execute();




}  

}

$data = new data;


