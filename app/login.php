<?php 

include('db_auth.php');
?>



<?php

if(isset($_SESSION['BMARRIAGE_SESS_ID'])){
$login=1;
header('Location: home.php');
}else{
	$login=0;
	
}
?>



<?php if(isset($_SESSION['SESS_MEMBER_ID'])){ /*echo "You are  logged in as ".$_SESSION['SESS_NAME']." And House is ".$_SESSION['SESS_HOUSE']."";*/  header('Location: logout.php');} ?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Butterfly Marriage - Login</title>

  <link rel='stylesheet' href='CSSJSMI/CSS/jquery-ui.css'>

    <link rel="stylesheet" href="CSSJSMI/CSS/style.css" media="screen" type="text/css" />
    <link rel="shortcut icon" href="IGJH3084JG/logo-2.png" />    

	<script src="CSSJSMI/JS/jquery.min.js"></script>
<style>
body{
	background-color:hsla(358,62%,12%,1.00);
	
}

</style>
    </head>

	<body>
<div class="cover">

</div>
<?php if(isset($_GET['errflag_li'])){
	$dispmsg = 'Incorrect Login Details'; 
echo '

<div class="login-card" style="padding-top:0; padding-bottom:0;">
	<div align="center">
    	<h4 class="ui-state-error-text ">'.$dispmsg.'</h4>
	</div>
</div> ';

}?>


<?php if(isset($_GET['errflag_li_notelig'])){
	$dispmsg = 'Account not Eligeibal for E-Vote'; 
echo '

<div class="login-card" style="padding-top:0; padding-bottom:0;">
	<div align="center">
    	<h4 class="ui-state-error-text ">'.$dispmsg.'</h4>
	</div>
</div> ';

}?>


<?php if(isset($_GET['reg'])){
	$dispmsg = ''; 
echo '
<div class="login-card fooler">
	<div align="center" >
		<h3>You have succesfully Registered. You will recieve an email once your submission is approved.</h3>
	</div>
</div>
<script>
var delay=3000; //1 seconds

setTimeout(function(){
  $(".fooler").fadeOut();
}, delay); 
</script>
 ';

}?>
  <div class="login-card">
  	<div align="center">
    	<img class="ui-icon-image" src="IGJH3084JG/logo.png" />
	</div>
    <h1 style="font-size:25px; font-weight:bold;">Butterfly Marriage Login Form</h1><br>
  
  <form action="master_action.php" method="post" class="form-1">
  	
    <input  required type="email" placeholder="abc@example.com" name="email" style="width:100%;" id='replication_form_id' class="input-mn_23-c" maxlength="97" autocomplete="off">




    <input  required type="password" name="uid" style="width:100%;" id='replication_form_id' class="input-mn_23-c"  placeholder="Password" autocomplete="off">


    
      
                        
    
    <input style="cursor:pointer" type="submit" name="login" class="login login-submit" value="Click to Login">
      <a href="sign_up.php" ><input  style="cursor:pointer" type="button" class=" login reg-submit" style=" width:100%" value="Register"></a>
  </form>
  <br>
  


</div>

</body>

</html>

