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
<div class="col-sm-12">
    <div class="panel">
        <div class="panel-body p-t-10">
            <div class="media-main">
                <div class="info">
                    	<div align="center" class="col-sm-12">
                        	<strong >Liked Profiles</strong>
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
 where lum_valid =1 and lreg_usr_valid =1 and lreg_usr_rel_ho_id in (".$g.") and lum_ad = 0 
 and lum_id  in (select l_target_rel_lum_id from d_likes where l_rel_lum_id = ".$_USER['lum_id']." and l_valid =1)
 order by lreg_usr_dnt asc ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
?>
<div class="col-sm-12">
    <div class="panel">
        <div class="panel-body p-t-10">
            <div class="media-main">
                <div class="info">
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
                   <div class="row">
                    	<div id="tingting<?php echo $row['lum_id'] ?>" align="center" class="col-sm-12">
                        <form id="winfwiun<?php echo $row['lum_id'] ?>" action="master_action.php" method="post">
                        <input type="hidden" name="prof_dlike" value="<?php echo md5($row['lum_id']) ?>" />
                        <input type="submit" class="btn btn-danger" value="Dislike the profile" />
                        </form>
							
                        </div>  
                    </div>

                </div>
            </div>                                
        </div> <!-- panel-body -->
    </div> <!-- panel -->
</div>

<?php

    }
} else {
}

?>


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
 
 
                    
                    
                    
                    <?php
$sql = "SELECT * from b_sm_logins l
left join c_master_gender g on l.lreg_usr_rel_ho_id = g.ho_id
 where lum_valid =1 and lreg_usr_valid =1 and lreg_usr_rel_ho_id in (".$g.") and lum_ad = 0 
 and lum_id  in (select l_target_rel_lum_id from d_likes where l_rel_lum_id = ".$_USER['lum_id']." and l_valid =1)
 order by lreg_usr_dnt asc ";
 $result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
	?>
	                    <script>
					$(document).ready(function () {
    $('#winfwiun<?php echo $row['lum_id'] ?>').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url : $(this).attr('action') || window.location.pathname,
            type: "POST",
            data: $(this).serialize(),
            success: function (data) {
                $("#tingting<?php echo $row['lum_id'] ?>").html("Profile Removed from liked list");
            },
            error: function (jXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });
});
					</script>
	<?php
    }
} else {
    echo "0 results";
}
?>




    </body>

</html>
