<?php 

include('db_auth.php');
?>



<?php


if(isset($_SESSION['BMARRIAGE_SESS_ID'])){
session_destroy();
session_start();
}else{
	$login=0;
	
}
?>


<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="shortcut icon" href="img/favicon_1.ico">

  <title>Butterfly Marriage - Registration Form </title>

        


        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-reset.css" rel="stylesheet">

        <!--Animation css-->
        <link href="css/animate.css" rel="stylesheet">

        <!--Icon-fonts css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/ionicon/css/ionicons.min.css" rel="stylesheet" />

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="assets/morris/morris.css">


        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/helper.css" rel="stylesheet">
        

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->
        
   
    </head>


    <body style="background-color: hsla(358,62%,12%,1.00);">

        <div class="wrapper-page animated fadeInDown" style="width:auto; margin-left:10px; margin-right:10px">
            <div class="panel panel-color panel-primary">
                <div class="panel-heading"> 
                   <h3 class="text-center m-t-10"> Create a new Account </h3>


                </div> 
                                    <form class="form-horizontal m-t-40" id="signupForm" method="post" action="master_action.php">
                                       <p align="center" style=" color:rgba(167,0,2,1.00)">Fill in the details below to recieve a confirmation. Confirmations usually takes 1-2 business days which entitles registrees to an account accessible via their personal email and password.<br>
Fill in the details below to complete your first step for registration. In the name section: if you are filling out the form on behalf of someone else, please write your OWN name and contact details.
Thank you</p>
                                    
<div class="row">
<div class="col-md-6">

                                        <div class="form-group ">
                                            <div class="col-lg-12">
                                            <label for="firstname" class="control-label">Firstname *</label>
                                                <input class=" form-control" id="firstname" name="regu_fname" type="text" required>
                                            </div>
                                        </div>

</div>
<div class="col-md-6">
                                        <div class="form-group ">
                                            <div class="col-lg-12">
                                            <label for="lastname" class="control-label">Lastname  (and middle name if any) *</label>
                                                <input class=" form-control" id="lastname" name="regu_lname" type="text" required>
                                            </div>
                                        </div>

</div>
</div>

<div class="row">
<div class="col-md-6">
                                        <div class="form-group ">
                                            <div class="col-lg-12">
                                            <label for="email" class="control-label">Email *</label>
                                                <input class="form-control " id="email" name="regu_email" type="email" required>
                                            </div>
                                        </div>

</div>
<div class="col-md-6">
                                        <div class="form-group ">
                                            <div class="col-xs-3">
                                            <label for="mob" class="control-label ">Mobile Number *</label>
                                                <input class="form-control " id="mob" name="regu_mob_cc" type="number" required placeholder="971" value="971">
                                            </div>
                                            <div class="col-xs-9">
                                                <label for="mob2" class="control-label ">_</label>

                                                <input class="form-control " id="mob2" name="regu_mob_no" type="number" required placeholder="555555555">
                                            </div>
                                        </div>
</div>
</div>


<div class="row">
<div class="col-md-12">
                                        <div class="form-group ">
                                            <div class="col-lg-12">
                                            <label for="confirm_password" class="control-label ">Password * (will be used for login purposes)</label>
                                                <input class="form-control " id="confirm_password" name="regu_pw" type="text" required>
                                            </div>
                                        </div>
</div>
</div>


<div class="row">
<div class="col-md-4">
                                        <div class="form-group ">
                                            <div class="col-lg-12">
                                            <label for="gender" class="control-label ">Gender *</label>
                                                <select class=" form-control" id="gender" name="regu_gender" required>
                                                	<option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                    <option value="3">Other</option>
                                                </select>
                                            </div>
                                        </div>

</div>
<div class="col-md-4">
                                        <div class="form-group ">
                                            <div class="col-lg-6">
                                            <label for="height_a" class="control-label">Height *</label>
                                                <input class=" form-control" id="height_a" name="regu_height_ft" type="number" required placeholder="Feet">
                                            </div>
                                            <div class="col-lg-6">
                                            <label for="height_ab" class="control-label">_</label>
                                                <input class=" form-control" id="height_ab" name="regu_height_in" type="number" required placeholder="Inches">
                                            </div>
                                        </div>
</div>
<div class="col-md-4">
                                        <div class="form-group ">
                                            <div class="col-lg-12">
                                            <label for="age" class="control-label">Age *</label>
                                                <input class=" form-control" id="age" name="regu_age" type="number" required>
                                            </div>
                                        </div>
</div>
</div>


<div class="row">
<div class="col-md-4">
                                        <div class="form-group ">
                                            <div class="col-lg-12">
                                            <label for="wjen" class="control-label">What town and country do you live in? *</label>
                                                <input class=" form-control" id="wjen" name="regu_live" type="text" required>
                                            </div>
                                        </div>
</div>
<div class="col-md-4">

                                        <div class="form-group ">
                                            <div class="col-lg-12">
                                            <label for="lastname" class="control-label">Ethnicity? *</label>
                                                <input class=" form-control" id="lastname" name="regu_eth" type="text" required>
                                            </div>
                                        </div>


</div>
<div class="col-md-4">
                                        <div class="form-group ">
                                            <div class="col-lg-12">
                                            <label for="lastname" class="control-label ">Nationality? *</label>
                                                <input class=" form-control" id="lastname" name="regu_nation" type="text" required>
                                            </div>
                                        </div>
</div>
</div>


<div class="row">
<div class="col-md-12">
                                        <div class="form-group ">
                                            <div class="col-lg-10 col-xs-offset-1">
                                            <label for="lastname" class="control-label ">If you have been married before, please give brief details</label>
                                                <textarea class=" form-control" id="lastname" name="regu_marriedb"  required> </textarea>
                                            </div>
                                        </div>
</div>
</div>

<div class="row">
<div class="col-md-12">
                                        <div class="form-group ">
                                            <div class="col-lg-10 col-xs-offset-1">
                                            <label for="lastname" class="control-label ">What is you profession? *</label>
                                                <textarea class=" form-control" id="lastname" name="regu_proff" required> </textarea>
                                            </div>
                                        </div>
</div>
</div>

<div class="row">
<div class="col-md-12">

                                        <div class="form-group ">
                                            <div class="col-lg-10 col-xs-offset-1">
                                            <label for="lastname" class="control-label">Briefly Summarise your educational background *</label>
                                                <textarea class=" form-control" id="lastname" name="regu_edu" required> </textarea>
                                            </div>
                                        </div>
</div>
</div>

<div class="row">
<div class="col-md-12">
                                        <div class="form-group ">
                                            <div class="col-lg-10 col-xs-offset-1">
                                            <label for="lastname" class="control-label ">What do you like to do in your spare time? *</label>
                                                <textarea class=" form-control" id="lastname" name="regu_sparetime" required> </textarea>
                                            </div>
                                        </div>
</div>
</div>

<div class="row">
<div class="col-md-12">
                                        <div class="form-group ">
                                            <div class="col-lg-10 col-xs-offset-1">
                                            <label for="lastname" class="control-label ">What preferences do you have for your potential spouse? *</label>
                                                <textarea class=" form-control" id="lastname" name="regu_pref" required> </textarea>
                                            </div>
                                        </div>



</div>
</div>

<div class="row">
<div class="col-md-12">
                                        <div class="form-group ">
                                            <div class="col-lg-10 col-xs-offset-1">
                                <label for="lastname" class="control-label ">Please write a paragraph about yourself, your personality, ambitions etc. *</label>
                                                <textarea class=" form-control" id="lastname" name="regu_para" required> </textarea>
                                            </div>
                                        </div>
</div>
</div>













                                        

                                        <div class="form-group">
                                            <div align="center">
                                            <input type="hidden"  name="register_new" value="1"/>
                                                <button   class="btn btn-success" type="submit">Register</button><br>
<br>

                                                <a href="login.php"><button class="btn btn-danger" type="button">Back to Login</button></a>
                                            </div>
                                        </div>
                                    </form>
                
            </div>
        </div>

        


        <!-- js placed at the end of the document so the pages load faster -->
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
            
        <!--common script for all pages-->
        <script src="js/jquery.app.js"></script>

    
    </body>

<!-- the manregister.htmlby ayan ahmad 07:31:29 GMT -->
</html>
