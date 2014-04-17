<?php
session_start(); 
?>
<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
            <div class="container">       
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav offspan4">
                        <li><a href='user_Portfolio?value=true'><span class="glyphicon glyphicon-briefcase"></span> My Portfolio</a>
                        </li>
                        <li><a href="user_Portfolio?money=true"><span class="glyphicon glyphicon-usd"></span> My Money</a>
                        </li>
                        <li><a href="#"><span class="glyphicon glyphicon-stats"></span> Profit/Loss</a>
                        </li>
                    </ul>
                    <div class="nav navbar-nav navbar-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['user_Name'] ?>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="user_Account.php?account=true"><span class="glyphicon glyphicon-folder-open"></span> Account</a></li>
                                <li><a href="user_Account.php?profile=true"><span class="glyphicon glyphicon-picture"></span> My profile</a></li>
                                <li><a href="user_Account.php?logout=true"><span class="glyphicon glyphicon-log-out"></span> Log-out</a></li>
                            </ul>
                        </div>          
                    </div>     
                </div>
            </div>
        </nav>
