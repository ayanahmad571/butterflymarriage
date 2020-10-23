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



                    <a href="profiles_liked.php"><div class="col-sm-4">
                        <div class="panel">
                            <div class="panel-body p-t-10">
                                <div class="media-main">
                                    <div class="info">
                                        <h4>Profiles you have liked</h4>
                                    </div>
                                </div>                                
                            </div> <!-- panel-body -->
                        </div> <!-- panel -->
                    </div></a> <!-- end col -->

                    <a href="profiles_all.php"><div class="col-sm-4">
                        <div class="panel">
                            <div class="panel-body p-t-10">
                                <div class="media-main">
                                    <div class="info">
                                        <h4>All profiles (not liked by you)</h4>
                                    </div>
                                </div>                                
                            </div> <!-- panel-body -->
                        </div> <!-- panel -->
                    </div></a> <!-- end col -->

                    <a href="profiles_oliked.php"><div class="col-sm-4">
                        <div class="panel">
                            <div class="panel-body p-t-10">
                                <div class="media-main">
                                    <div class="info">
                                        <h4>Profiles of people that have liked your profile</h4>
                                    </div>
                                </div>                                
                            </div> <!-- panel-body -->
                        </div> <!-- panel -->
                    </div></a> <!-- end col -->


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
