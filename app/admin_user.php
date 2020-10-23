<?php
include('include.php');
?>
<?php 
include('page_that_has_to_be_included_for_every_user_visible_page.php');
?>

<?php
if($login == 1){
	if(trim($_USER['lum_ad']) == 1){
		$admin = 1;
	}else{
		$admin = 0;
	}
}else{
	$admin = 0;
	die('Login to View this page <a href="login.php"><button>Login</button></a>');
}


if($admin == 0){
	die('<h1>503 </h1><br>
Access Denied');
}

$sed = getdatafromsql($conn,"select * from e_sv_modules where mo_href = '".basename($_SERVER['PHP_SELF'])."'");
if(is_array($sed)){

}else{
	die('ErrorADMM(UH');
}


if($_USER['lum_ad_level'] >= $sed['mo_min_ad_level']){
}else{
	die('<h1>503 </h1><br>
Access Denied');
}





?>
<!DOCTYPE html>
<html lang="en">

<head>

<?php get_head(); ?>
    <link href="assets/timepicker/bootstrap-timepicker.min.css" rel="stylesheet" />
        <link href="assets/timepicker/bootstrap-datepicker.min.css" rel="stylesheet" />

        
    </head>


    <body>

        <!-- Aside Start-->
        <aside class="left-panel">

             
        <?php
		give_brand();
		?>
            <?php 
			get_modules($conn,$login,$admin,$_USER);
			?>
                
        </aside>
        <!-- Aside Ends-->


        <!--Main Content Start -->
        <section class="content">
            
            <!-- Header -->
            <header class="top-head container-fluid">
                <button type="button" class="navbar-toggle pull-left">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                
                <!-- Left navbar -->
                <nav class=" navbar-default" role="navigation">
                    

                    <!-- Right navbar -->
                    <?php
                    if($login==1){
						include('ifloginmodalsection.php');
					}
					?>
                    
                    <!-- End right navbar -->
                </nav>
                
            </header>
            <!-- Header Ends -->


            <!-- Page Content Start -->
            <!-- ================== -->

            <div class="wraper container-fluid">
            <div class="page-title"> 
                    <h3 class="title">Welcome <?php echo ucwords($_USER['lreg_usr_fname'])?> !</h3> 
                </div>



                 <!-- end row -->

                <div class="row">
                    

                    <div class="col-lg-12	">

                        <div class="panel panel-default"><!-- /primary heading -->
                            <div class="portlet-heading">
      
                            <div class="panel-heading">
                                <h3 class="panel-title">Approve Users</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <!-- -->

                               <?php

	$boxsql = "SELECT * FROM `b_sm_users` u left join c_master_gender g on u.reg_usr_rel_ho_id = g.ho_id where  reg_usr_gen_rel_lum = 0  and reg_usr_valid= 1";

$boxres = $conn->query($boxsql);

if ($boxres->num_rows > 0) {
    // output data of each row
	$cc =1;
    while($boxrw = $boxres->fetch_assoc()) {
		#firts loop begins
		if($boxrw['reg_usr_valid'] == 1){



			
			$bg = 'info';
			
		




		}else{
	

			$bg = 'danger';
			
		
		
			
		}
		
		

		
		

		
		echo '
<div class="col-xs-12">
	<!-- Start Profile Widget -->
	<div style="border:1px grey solid" class="profile-widget text-center">
		<div class="bg-'.$bg.' bg-profile"></div>
		<h3>'.$boxrw['reg_usr_fname'].' '.$boxrw['reg_usr_lname'].'</h3>

<form id="ApprovalForm" method="post" action="master_action.php">
                                    
<div class="row">
<div class="col-md-6">

                                        <div class="form-group ">
                                            <div class="col-lg-12">
                                            <label for="firstname" class="control-label">Firstname *</label>
                                                <input class=" form-control" id="firstname" name="a_fname" type="text"  value = "'.$boxrw['reg_usr_fname'].'" required>
                                            </div>
                                        </div>

</div>
<div class="col-md-6">
                                        <div class="form-group ">
                                            <div class="col-lg-12">
                                            <label for="lastname" class="control-label">Lastname  (and middle name if any) *</label>
                                                <input class=" form-control" id="lastname" name="a_lname" type="text"   value = "'.$boxrw['reg_usr_lname'].'" required>
                                            </div>
                                        </div>

</div>
</div>

<div class="row">
<div class="col-md-6">
                                        <div class="form-group ">
                                            <div class="col-lg-12">
                                            <label for="email" class="control-label">Email *</label>
                                                <input class="form-control " id="email" name="a_email" type="email"   value = "'.$boxrw['reg_usr_email'].'" required>
                                            </div>
                                        </div>

</div>
<div class="col-md-6">
                                        <div class="form-group ">
                                            <div class="col-xs-3">
                                            <label for="mob" class="control-label ">Mobile Number *</label>
                                                <input class="form-control " id="mob" name="a_mob_cc" type="number"   value = "'.$boxrw['reg_usr_mob_cc'].'" required placeholder="971" value="971">
                                            </div>
                                            <div class="col-xs-9">
                                                <label for="mob2" class="control-label ">_</label>

                                                <input class="form-control " id="mob2" name="a_mob_no" type="number"   value = "'.$boxrw['reg_usr_mob_no'].'" required placeholder="555555555">
                                            </div>
                                        </div>
</div>
</div>


<div class="row">
<div class="col-md-12">
                                        <div class="form-group ">
                                            <div class="col-lg-12">
                                            <label for="confirm_password" class="control-label ">Password * (will be used for login purposes)</label>
                                                <input class="form-control " id="confirm_password" name="a_pw" type="text"   value = "'.$boxrw['reg_usr_pw'].'" required>
                                            </div>
                                        </div>
</div>
</div>


<div class="row">
<div class="col-md-4">
                                        <div class="form-group ">
                                            <div class="col-lg-12">
                                            <label for="gender" class="control-label ">Gender *</label>
                                                <select class=" form-control" id="gender" name="a_gender"  required>
												'; if($boxrw['reg_usr_rel_ho_id'] == 2){
													echo '
													<option value="1">Male</option>
                                                    <option value="2" selected>Female</option>';

												}else{
													echo '
													<option value="1" selected>Male</option>
                                                    <option value="2">Female</option>';
												} echo'
                                                    <option value="3">Other</option>
                                                </select>
                                            </div>
                                        </div>

</div>
<div class="col-md-4">
                                        <div class="form-group ">
                                            <div class="col-lg-6">
                                            <label for="height_a" class="control-label">Height *</label>
                                                <input class=" form-control" id="height_a" name="a_height_ft" type="number"   value = "'.$boxrw['reg_usr_height_ft'].'" required placeholder="Feet">
                                            </div>
                                            <div class="col-lg-6">
                                            <label for="height_ab" class="control-label">_</label>
                                                <input class=" form-control" id="height_ab" name="a_height_in" type="number"   value = "'.$boxrw['reg_usr_height_in'].'" required placeholder="Inches">
                                            </div>
                                        </div>
</div>
<div class="col-md-4">
                                        <div class="form-group ">
                                            <div class="col-lg-12">
                                            <label for="age" class="control-label">Age *</label>
                                                <input class=" form-control" id="age" name="a_age" type="number"   value = "'.$boxrw['reg_usr_age'].'" required>
                                            </div>
                                        </div>
</div>
</div>


<div class="row">
<div class="col-md-4">
                                        <div class="form-group ">
                                            <div class="col-lg-12">
                                            <label for="wjen" class="control-label">What town and country do you live in? *</label>
                                                <input class=" form-control" id="wjen" name="a_live" type="text"   value = "'.$boxrw['reg_usr_live'].'" required>
                                            </div>
                                        </div>
</div>
<div class="col-md-4">

                                        <div class="form-group ">
                                            <div class="col-lg-12">
                                            <label for="lastname" class="control-label">Ethnicity? *</label>
                                                <input class=" form-control" id="lastname" name="a_eth" type="text"   value = "'.$boxrw['reg_usr_eth'].'" required>
                                            </div>
                                        </div>


</div>
<div class="col-md-4">
                                        <div class="form-group ">
                                            <div class="col-lg-12">
                                            <label for="lastname" class="control-label ">Nationality? *</label>
                                                <input class=" form-control" id="lastname" name="a_nation" type="text"   value = "'.$boxrw['reg_usr_nation'].'" required>
                                            </div>
                                        </div>
</div>
</div>


<div class="row">
<div class="col-md-12">
                                        <div class="form-group ">
                                            <div class="col-lg-10 col-xs-offset-1">
                                            <label for="lastname" class="control-label ">If you have been married before, please give brief details</label>
                                                <textarea class=" form-control" id="lastname" name="a_marriedb"  required>'.$boxrw['reg_usr_marriedb'].' </textarea>
                                            </div>
                                        </div>
</div>
</div>

<div class="row">
<div class="col-md-12">
                                        <div class="form-group ">
                                            <div class="col-lg-10 col-xs-offset-1">
                                            <label for="lastname" class="control-label ">What is you profession? *</label>
                                                <textarea class=" form-control" id="lastname" name="a_proff" required>'.$boxrw['reg_usr_proff'].'  </textarea>
                                            </div>
                                        </div>
</div>
</div>

<div class="row">
<div class="col-md-12">

                                        <div class="form-group ">
                                            <div class="col-lg-10 col-xs-offset-1">
                                            <label for="lastname" class="control-label">Briefly Summarise your educational background *</label>
                                                <textarea class=" form-control" id="lastname" name="a_edu" required>'.$boxrw['reg_usr_edu'].'  </textarea>
                                            </div>
                                        </div>
</div>
</div>

<div class="row">
<div class="col-md-12">
                                        <div class="form-group ">
                                            <div class="col-lg-10 col-xs-offset-1">
                                            <label for="lastname" class="control-label ">What do you like to do in your spare time? *</label>
                                                <textarea class=" form-control" id="lastname" name="a_sparetime" required> '.$boxrw['reg_usr_sparetime'].' </textarea>
                                            </div>
                                        </div>
</div>
</div>

<div class="row">
<div class="col-md-12">
                                        <div class="form-group ">
                                            <div class="col-lg-10 col-xs-offset-1">
                                            <label for="lastname" class="control-label ">What preferences do you have for your potential spouse? *</label>
                                                <textarea class=" form-control" id="lastname" name="a_pref" required>'.$boxrw['reg_usr_pref'].'  </textarea>
                                            </div>
                                        </div>



</div>
</div>

<div class="row">
<div class="col-md-12">
                                        <div class="form-group ">
                                            <div class="col-lg-10 col-xs-offset-1">
                                <label for="lastname" class="control-label ">Please write a paragraph about yourself, your personality, ambitions etc. *</label>
                                                <textarea class=" form-control" id="lastname" name="a_para" required>'.$boxrw['reg_usr_para'].' </textarea>
                                            </div>
                                        </div>
</div>
                         
<hr>
                                        <div class="">
                                            <div class="col-lg-12">
											<input name="yh_com" type="hidden" value="'.md5(md5(sha1(sha1(md5(md5($boxrw['reg_usr_id'].'hir39efnewsfejirjeofkvjrjdnjjenfkvkijonreij3nj')))))).'" />
			<input type="submit" class="btn btn-success m-t-20" name="usr_make_ac" value="Approve and Send login" />
			
</form>

                                                <form action="master_action.php" method="post">
		<input name="yh_com" type="hidden" value="'.md5(md5(sha1(sha1(md5(md5($boxrw['reg_usr_id'].'hir39efnewsfejirjrjdnjjenfkv ijfkorkvnkorvfk')))))).'" />
			<input type="submit" class="btn btn-danger m-t-20" name="usr_make_inac" value="Disapprove" /></form>
			
                                            </div>
                                        </div>
</div>















	</div>
	<!-- End Profile Widget -->
</div>

                                        
	';
	if(($cc % 1) == 0){
		echo '</div><div class="row">';
	}
	$cc++;
	#first loop ends
	$munsclaimed = 'None';
    }
} else {
    echo "0 results";
}
 ?> 
 
 
                                        
                                 
                                        <!-- -->
                                    </div>
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->

                    
                </div> <!-- End row -->


            </div> <!-- End row -->


            </div>
            <!-- Page Content Ends -->
            <!-- ================== -->

            <!-- Footer Start -->
            
       
                  <!-- Footer Start -->
            <footer class="footer">
<?php auto_copyright(); // Current year?>

  AhmadAnonymous.
            </footer>
            <!-- Footer Ends -->



        </section>
        <!-- Main Content Ends -->
  


      <?php  
	  get_end_script();
	  ?>   
       <script src="assets/timepicker/bootstrap-datepicker.js"></script>


<script>
$(document).ready(function() {
	$('.datepicker').datepicker();		
});
</script>
      
           </body>

</html>
