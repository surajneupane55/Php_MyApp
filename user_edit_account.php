<?php
session_start();
include_once("edit_form_process.php");
include_once("user_Process.php");
include_once("edit_user.php");
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
                    <div class="col-md-4">



                    </div>
                    <div class="col-md-5">
                      
                        <?php
                        if (isset($_SESSION["Account_menu"])) {
                            
                            ?>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr class="active">        
                                        <td class="info"><a href="edit_user.php?edit_usr=true"><span class=" glyphicon glyphicon-edit"> EditProfile</a></td>
                                    </tr>
                                    <tr class="active">        
                                        <td class="info"><a href="user_Delete.php?delet_usr=true"><span class=" glyphicon glyphicon-trash"></span> Delete Account</a></td>
                                    </tr>
                                </table>
                            </div>
                            <?php
                        } else {
                            if ($_SESSION["edit_user_message"]) {
                                echo $_SESSION["edit_user_message"];
                                unset($_SESSION['edit_user_message']);
                            }
                        }
                        unset($_SESSION["Account_menu"]);
                        ?> 
                    </div>
                    <div class="col-md-3">
                           
                                        <?php
                                       if( isset($_SESSION['profile_detail'])){
                                        $user_detail = $_SESSION["user_detail"];
                                         $count = count($user_detail) - 1;
                                         
                                            ?>   
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tr class="active">        
                                                        <td class="info"><span class=" glyphicon glyphicon-user"> <?php echo $user_detail[$count]['userName']; ?></td>
                                                    </tr>
                                                    <tr class="active">        
                                                        <td class="info"><?php echo "Name:" . $user_detail[$count]['firstName']; ?> <?php echo $user_detail[$count]['lastname']; ?></td>
                                                    </tr>
                                                    <tr class="active">        
                                                        <td class="info"><?php echo"Address:" . $user_detail[$count]['adress'] . "</br>"; ?> 
                                                            <?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;" . $user_detail[$count]['zip']; ?> <?php echo $user_detail[$count]['city']; ?> </td>
                                                        </tr>
                                                        <tr class="active">        
                                                            <td class="info"><?php echo "Country:" . $user_detail[$count]['country']; ?></td>
                                                        </tr>
                                                        <tr class="active">        
                                                            <td class="info"><?php echo "Email:" . $user_detail[$count]['e_mail']; ?></td>
                                                        </tr>
                                                    </table>
                                                </div>

                                                <?php
                                                
                                            }
                                            unset($_SESSION["profile_detail"]);
                                            ?>
                        <?php
                        
                                if ($_SESSION["edit_user_message"]) {
                                    echo $_SESSION["edit_user_message"];
                                }
                                unset($_SESSION["edit_user_message"]);
                                ?>

                              
                        </div>

                </div>
            </div>
        </div>
        <?php include 'Footer.php'; ?>
    </body>
</html>