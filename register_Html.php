<?php 
session_start();
include_once("form.php"); 
?>

<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Learning Market</title>

   <?php include 'bootstrap.php'; ?>
      
    </head>

    <body>

     <div class="nav navbar-inverse nav-bar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-  collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="row">
            <div class="col-md-9 col-md-offset-10">              
              <a class="navbar-text">Register</a>
            </div>
          </div> </div>        
        </div>
      </div>
      <div class="jumbotron">
       <div class="container"> 
        <div class="row">
          <div class="col-md-9 col-md-offset-4">
            <form class="form-horizontal" role="form" name="register" id="register" action="register_Validation.php" method="post">
             <div class="form-group">
              <div class="col-sm-4">
                <span class="help-block text-center">
                  <?php
                  if($form->num_errors > 0) echo $form->num_errors." Errors found in the form!!<br>";
                  else if(isset($_SESSION['message']))
                  {
                    echo $_SESSION['message']."<br>";
                    unset($_SESSION['message']);
                  }
                  else echo "<br>";
                  ?>
                  <?php
                  if(isset($_SESSION['reg_user']))
                   $form->user_registerError();
                 unset($_SESSION['reg_user']);
                 ?>

               </span>



             </div>

           </div>
           <div class="form-group">
            <label for="inputfirstname" class="col-sm-2 control-label">First Name</label>
            <div class="col-sm-3">
             <input type="text" class="form-control" id="inputfirstname" name="inputfirstname" value='<?php echo $form->value("inputfirstname"); ?>' placeholder="FirstName">
           </div>
           <div class="col-sm-6">
             <span class="help-block">
               <?php echo $form->error("FirstName"); ?>
             </span>
           </div>
         </div>

         <div class="form-group">
          <label for="inputlastname" class="col-sm-2 control-label">Last Name</label>
          <div class="col-sm-3">
           <input type="text" class="form-control" id="inputlastname" name="inputlastname"value='<?php echo $form->value("inputlastname"); ?>' placeholder="LastName">
         </div>
         <div class="col-sm-6">
           <span class="help-block">
             <?php echo $form->error("LastName"); ?>
           </span>
         </div>
       </div> 

       <div class="form-group">
        <label for="inputusername" class="col-sm-2 control-label">Username</label>
        <div class="col-sm-3">
         <input type="text" class="form-control" id="inputusername" name="inputusername"value='<?php echo $form->value("inputusername"); ?>' placeholder="UserName">
       </div>
       <div class="col-sm-6">
         <span class="help-block">
           <?php echo $form->error("UserName"); ?>
         </span>
       </div>
     </div>

     <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
      <div class="col-sm-3">
       <input type="password" class="form-control" id="inputpassword" name="inputpassword"value='<?php echo $form->value("inputpassword"); ?>' placeholder="Password">
     </div>
     <div class="col-sm-6">
       <span class="help-block">
         <?php echo $form->error("Password"); ?>
       </span>
     </div>
   </div>

   <div class="form-group">
    <label for="inputrepeatPassword3" class="col-sm-2 control-label">Conform Password</label>
    <div class="col-sm-3">
     <input type="password" class="form-control" id="inputrepeatpassword" name="inputrepeatpassword"value='<?php echo $form->value("inputrepeatpassword"); ?>'placeholder=" Conform Password">
   </div>
   <div class="col-sm-6">
     <span class="help-block">
       <?php echo $form->error("Repeatpassword"); ?>
     </span>
   </div>
 </div>


 <div class="form-group">
  <label for="inputadress" class="col-sm-2 control-label">Adress</label>
  <div class="col-sm-3">
    <input type="text" class="form-control" id="inputadress" name="inputadress"value='<?php echo $form->value("inputadress"); ?>' placeholder="Adress">
  </div>
  <div class="col-sm-6">
   <span class="help-block">
     <?php echo $form->error("Address"); ?>
   </span>
 </div>
</div>

<div class="form-group">
  <label for="inputcity" class="col-sm-2 control-label">City</label>
  <div class="col-sm-3">
    <input type="text" class="form-control" id="inputcity" name="inputcity" value='<?php echo $form->value("inputcity"); ?>'placeholder="City">
  </div>
  <div class="col-sm-6">
   <span class="help-block">
     <?php echo $form->error("City"); ?>
   </span>
 </div>
</div>

<div class="form-group">
  <label for="inputzip" class="col-sm-2 control-label">Zip Code</label>
  <div class="col-sm-3">
    <input type="text" class="form-control" id="inputzip" name="inputzip"value='<?php echo $form->value("inputZip"); ?>' placeholder="Zip Code">
  </div>
  <div class="col-sm-6">
   <span class="help-block">
     <?php echo $form->error("Zip"); ?>
   </span>
 </div>
</div>

<div class="form-group">
  <label for="inputfirstname" class="col-sm-2 control-label">Email</label>
  <div class="col-sm-3">
    <input type="text" class="form-control" id="inputemail" name="inputemail"value='<?php echo $form->value("inputemail"); ?>' placeholder="Email">
  </div>
  <div class="col-sm-6">
   <span class="help-block">
     <?php echo $form->error("Email"); ?>
   </span>
 </div>
</div>  

<div class="form-group">
  <label for="inputcountry" class="col-sm-2 control-label">Country</label>
  <div class="col-sm-3">
    <input type="text" class="form-control" id="inputcountry" name="inputcountry" value='<?php echo $form->value("inputcountry"); ?>'placeholder="Country">
  </div>
  <div class="col-sm-6">
   <span class="help-block">
     <?php echo $form->error("Country"); ?>
   </span>
 </div>
</div>  

<div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" name="form1" class="btn btn-success">Register</button>
    
  </div>
</div>
</form>
</div>
</div>
</div>              

</div>
<?php include 'Footer.php'; ?>

</body>
</html>



