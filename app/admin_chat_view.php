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


<div class=" col-xs-12">
    <div class="panel">
        <div class="panel-body p-t-10">
            <div class="media-main">
                <div class="info">
                
<?php


$sql = "

SELECT c.*, a.lreg_usr_fname as oname,  b.lreg_usr_fname as tname FROM `d_approved_chat_messages` c
left join b_sm_logins a on c.`cam_rel_from_lum_id` = a.lum_id
left join b_sm_logins b on c.`cam_rel_to_lum_id` = b.lum_id

WHERE a.lum_valid = 1 and b.lum_valid =1 and `cam_valid` =1  and cam_hash = '".$_GET['id']."' order by cam_dnt asc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	$i =1;
	$t=0;
	
    while($row = $result->fetch_assoc()) {
if($i == 1){
	$t= $row['cam_rel_from_lum_id'];
}
if($row['cam_rel_from_lum_id'] == $t){

?>
                   <div class="row">
                    	<div class="col-sm-6">
							<p> <?php echo date('d-M-y @h:i:s a',$row['cam_dnt']) ?></p>
                        </div>  
                    	<div class="col-sm-6">
                        	<strong style="color:hsla(125,84%,22%,1.00)"><?php echo $row['oname'] ?>:</strong> <?php echo $row['cam_text'] ?> 
                        </div>  
                    </div>
<hr>

<?php
}

else{
?>

                   <div class="row">
                    	<div class="col-sm-6">
                        	<strong  style="color:rgba(135,2,10,1.00)"><?php echo $row['oname'] ?>:</strong> <?php echo $row['cam_text'] ?> 
                        </div>  
                    	<div class="col-sm-6">
							<p> <?php echo date('d-M-y @h:i:s a',$row['cam_dnt']) ?></p>
                        </div>  
                    </div>
<hr>
<?php
}
$i++;

    }
} else {
    echo "No Conversation";
}
?>


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
