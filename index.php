
<!DOCTYPE html>
<html lang="en">
<head>
    
  <?php include 'bootstrap.php'; ?>
  <title>Learning Market</title>
  <!-- Bootstrap -->
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>
    <body>
     <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
      <div class="container">       
       <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
         <li><a><span class="glyphicon glyphicon-home"></span> Home</a>
         </li>
       </ul>
       <ul class="nav navbar-nav navbar-right">
         <li><a href="#About" data-toggle="modal"><span class="glyphicon glyphicon-info-sign"></span> About</a>
         </li>	
       </ul>     
     </div>
   </div>>
 </nav>
 <main class="bs-docs-masthead" id="content" role="main">
  <div class="container " >
   <div class="jumbotron">
    <h2 class="text-center">Learn to trade NASDAQ!! </h3>
     <p class="text-center">It's Free!!!</p>
     <p class="text-center">This site is free and used only for the teaching learning purpose.All the stock bought and sold are intended to get used to with the investment and for learning purpose only! No real money is involved at any-point. Market data are provided by third party(Yahoo Finance) which takes no liability for error in data and strictly prohibit in using these for business purpose.</p
       <p><a type="button" class="btn btn-success btn-lg btn-block" href="logIn.php"><span class="glyphicon glyphicon-log-in"></span>  LogIn</a></>
        <p><a type="button" class="btn btn-primary pull-right" href="register_Html.php">New User? Register</a></p>
        </div>
      </div>
    </main>
  </div>
  <div class="modal fade" id="About" role="dialog">
    <div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       <h4 class="modal-title text-center">About</h4>
     </div>
     <div class="modal-body">
      <p class=text-center>Finance and Investment teachers around are struggling to give a clear understanding of stock price and market due to lack of tools available in the Internet. Either teacher should provide old newspaper for market data or student should work on time consuming excel sheet to input their stock price of different days to find the result. It was time consuming as well as on the other hand data were outdated. To solve these problem this demo app was developed where people can buy stock from NASDAQ on real time and sold it in future. The profit/loss is calculated on real time.</p>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>
  <?php include 'Footer.php'; ?>
  

</body>
</html>

