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
	
}

?>
<?php if(isset($_GET['id']) and ctype_alnum($_GET['id'])){
	$c = getdatafromsql($conn, "
	SELECT l.lum_id as lum FROM d_approve_chat c
left join b_sm_logins b on c.ch_lum_id_1 = b.lum_id
left join b_sm_logins l on c.ch_lum_id_2 = l.lum_id

where b.lum_valid = 1 and l.lum_valid =1 and
ch_valid =1 and ch_lum_id_1 = ".$_USER['lum_id']."  and ch_a = 1
and md5(sha1(l.lum_id)) =  '".$_GET['id']."'
 order by ch_dnt desc");
	if(!is_array($c)){
		die("Invalid ID");
	}
}else{
	die('Invalid Request');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

<?php get_head(); ?>
  <link href="assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">
        
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
<div class="col-sm-12">
    <div class="panel">
        <div class="panel-body p-t-10">
            <div class="media-main">
                <div class="info">
                    	<div align="center" class="col-sm-12">
                        	<strong >The complete profile is available below. Email or contact number may be used for communication.</strong>
                        </div>  
                    </div>
                </div>
            </div>                                
        </div> <!-- panel-body -->
    </div> <!-- panel -->

<?php
if($_USER['lreg_usr_rel_ho_id'] == 1){
	$g = '2,3';
}else{
	$g = '1,3';
}

$sql = "SELECT * from b_sm_logins l
left join c_master_gender g on l.lreg_usr_rel_ho_id = g.ho_id
 where lum_valid =1 and lreg_usr_valid =1 and lum_id = ".$c['lum']."
 order by lreg_usr_dnt asc ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
?>
<div class="col-lg-6 col-xs-12">
    <div class="panel">
        <div class="panel-body p-t-10">
            <div class="media-main">
                <div class="info">
                   <div class="row">
                    	<div class="col-sm-6">
                        	<strong>Email:</strong> <?php echo $row['lum_email']; ?>
                        </div>  
                    	<div class="col-sm-6">
                        	<strong>Contact Number:</strong> +<?php echo $row['lreg_usr_mob_cc'] ?>-<?php echo $row['lreg_usr_mob_no'] ?> 
                        </div>  
                    </div>
<hr>
                   <div class="row">
                    	<div class="col-sm-3">
                        	<strong>Name:</strong> <?php echo $row['lreg_usr_fname']." ".$row['lreg_usr_lname'] ?>
                        </div>  
                    	<div class="col-sm-3">
                        	<strong>Gender:</strong> <?php echo $row['ho_name'] ?>
                        </div>  
                    	<div class="col-sm-3">
                        	<strong>Height:</strong> <?php echo $row['lreg_usr_height_ft']." ft ".$row['lreg_usr_height_in']." in" ?>
                        </div>  
                    	<div class="col-sm-3">
                        	<strong>Age:</strong> <?php echo $row['lreg_usr_age'] ?>
                        </div>  
                    </div>
<hr>

                   <div class="row">
                    	<div class="col-sm-4">
                        	<strong>Town and Country:</strong> <?php echo $row['lreg_usr_live'] ?>
                        </div>  
                    	<div class="col-sm-4">
                        	<strong>Ethnicity:</strong> <?php echo $row['lreg_usr_eth'] ?>
                        </div>  
                    	<div class="col-sm-4">
                        	<strong>Nationality:</strong> <?php echo $row['lreg_usr_nation'] ?>
                        </div>  
                    </div>
<hr>
                   <div class="row">
                    	<div class="col-sm-12">
                        	<strong>If you have been married before, please give brief details:</strong> <br>
							<?php echo $row['lreg_usr_marriedb'] ?>
                        </div>  
                    </div>
<hr>
                   <div class="row">
                    	<div class="col-sm-12">
                        	<strong>What is you profession?</strong> <br>
							<?php echo $row['lreg_usr_proff'] ?>
                        </div>  
                    </div>
<hr>
                   <div class="row">
                    	<div class="col-sm-12">
                        	<strong>Briefly Summarise your educational background:</strong> <br>
							<?php echo $row['lreg_usr_edu'] ?>
                        </div>  
                    </div>
<hr>
                   <div class="row">
                    	<div class="col-sm-12">
                        	<strong>What do you like to do in your spare time?</strong> <br>
							<?php echo $row['lreg_usr_sparetime'] ?>
                        </div>  
                    </div>
<hr>
                   <div class="row">
                    	<div class="col-sm-12">
                        	<strong>What preferences do you have for your potential spouse?</strong> <br>
							<?php echo $row['lreg_usr_pref'] ?>
                        </div>  
                    </div>
<hr>
                   <div class="row">
                    	<div class="col-sm-12">
                        	<strong>Please write a paragraph about yourself, your personality, ambitions etc:</strong> <br>
							<?php echo $row['lreg_usr_para'] ?>
                        </div>  
                    </div>
<hr>
                    



                </div>
            </div>                                
        </div> <!-- panel-body -->
    </div> <!-- panel -->
</div>

<?php

    }
} else {
    echo "0 results";
}

?>
<div class="col-lg-6 col-xs-12">
    <div class="panel">
        <div class="panel-body p-t-10">
            <div class="media-main">
                <div class="info">
                
<?php


$sql = "SELECT * FROM `d_approved_chat_messages` where cam_valid =1 and cam_hash = '".sort_lums_hash($c['lum'], $_USER['lum_id'])."' order by cam_dnt asc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

if($row['cam_rel_from_lum_id'] == $_USER['lum_id']){

?>
                   <div class="row">
                    	<div class="col-sm-6">
							<p> <?php echo date('d-M-y @h:i:s a',$row['cam_dnt']) ?></p>
                        </div>  
                    	<div class="col-sm-6">
                        	<strong style="color:hsla(125,84%,22%,1.00)">You:</strong> <?php echo $row['cam_text'] ?> 
                        </div>  
                    </div>
<hr>

<?php
}

else{
?>

                   <div class="row">
                    	<div class="col-sm-6">
                        	<strong  style="color:rgba(135,2,10,1.00)">Them:</strong> <?php echo $row['cam_text'] ?> 
                        </div>  
                    	<div class="col-sm-6">
							<p> <?php echo date('d-M-y @h:i:s a',$row['cam_dnt']) ?></p>
                        </div>  
                    </div>
<hr>
<?php
}
    }
} else {
    echo "No Conversation";
}
?>

                  <form action="master_action.php" method="post"> 
                  
                  <div class="row">
                    	<div class="col-xs-10">
                        	<input autofocus type="text" class="form-control" name="ch_text" required />
                            <input type="hidden" name="ch_hash" value="<?php echo md5(sha1($c['lum'])) ?>" />
                        </div>  
                    	<div class="col-xs-2">
                            <input width="100%" type="submit" class="btn btn-success" value="Send" />
                        </div>  
                    </div>
                    
                    </form>

                </div>
            </div>                                
        </div> <!-- panel-body -->
    </div> <!-- panel -->
</div>


</div>
            <!-- Page Content Ends -->
            <!-- ================== -->

            <!-- Footer Start -->
            <footer class="footer">
<?php auto_copyright(); // Current year?>

  Anonymous.
            </footer>
            <!-- Footer Ends -->




        </section>
        <!-- Main Content Ends -->
  


      <?php  
	  get_end_script();
	  ?>
      
            
         <script src="assets/fullcalendar/moment.min.js"></script>
        <script src="assets/fullcalendar/fullcalendar.min.js"></script>
        <!--dragging calendar event-->
<script>
!function($) {
    "use strict";

    var SweetAlert = function() {};

    //examples 
    SweetAlert.prototype.init = function() {
        
<?php 

if(isset($_GET['mailsent'])){
	echo ' $(document).ready(function(){
        swal("Mail Sent!", "An Email regarding the issue has been sent . You will get a reply to the specified email within a few days", "success")
    });';
}
?>
    //Success Message
   


    },
    //init
    $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.SweetAlert.init()
}(window.jQuery);
</script>
<?php 

if($login == 1){
	get_timer_sc(1);
}

?>
 
        


 
 <script>
 
<?php /*
$(document).ready(function(e) {
	
	
	



setInterval(function()
{ 
    $.ajax({
      type:"post",
	  data:{'lo_ejhrsk':'news'},
      url:"master_action.php",
	  success:function(data)
      {
        $("#page_news_refr").html(data);
		  //do something with response data
      }
    });
}, 5000);//time in milliseconds 






}); */ ?>

	
 </script>   


    </body>

</html>
