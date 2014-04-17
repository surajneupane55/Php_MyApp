<?php
session_start();
include_once("edit_form_process.php");
?>
<html lang="en">
    <head>
        <?php include 'bootstrap.php'; ?>
    </head>
    <body>
        <?php include 'user_tab.php'; ?>
        <div class="jumbotron">
            <div class="container"> 
                <div class="row">
                    <div class="col-md-5">
                    </div>
                    <div class="col-md-4">
                        <?php
                        $user_detail = $_SESSION["user_detail"];
                        $count = count($user_detail) - 1;
                        if ($edit_form_process->display_form()) {
                            ?> 
                            <form class="form-horizontal" role="form" name="edit_user" id="edit_user" action="user_edit_Process.php" method="post">
                                <div class="form-group">
                                    <label for="inputusername" class="col-sm-4 control-label">User Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="inputusername" name="inputusername" placeholder="<?php echo $user_detail[$count]['userName']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputfirstname" class="col-sm-4 control-label">First Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="inputfirstname" name="inputfirstname" placeholder="<?php echo $user_detail[$count]['firstName']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputlastname" class="col-sm-4 control-label">Last Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="inputlastname" name="inputlastname" placeholder="<?php echo $user_detail[$count]['lastname']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputadress" class="col-sm-4 control-label">Adress</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="inputadress" name="inputadress" placeholder="<?php echo $user_detail[$count]['adress']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputcity" class="col-sm-4 control-label">City</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="inputcity" name="inputcity" placeholder="<?php echo $user_detail[$count]['city']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputzip" class="col-sm-4 control-label">Zip</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="inputzip" name="inputzip" placeholder="<?php echo $user_detail[$count]['zip']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputcountry" class="col-sm-4 control-label">Country</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="inputcountry" name="inputcountry" placeholder="<?php echo $user_detail[$count]['country']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputemail" class="col-sm-4 control-label">Email</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="inputemail" name="inputemail" placeholder="<?php echo $user_detail[$count]['e_mail']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" name="form1" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
                            <?php
                            unset($_SESSION["edit_usr"]);
                        }
                        ?> 

                    </div>


                </div>     
            </div>     
        </div>
        <?php include 'Footer.php'; ?>
    </body>
</html>