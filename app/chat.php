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

                    <div class="col-xs-12">
                        <div class="panel">
                            <div class="panel-body p-t-10">
                                <div class="media-main">
                                    <div class="info">
                                        <h4>Approved</h4>
                                    </div>
                                </div>                                
                            </div> <!-- panel-body -->
                        </div> <!-- panel -->
                        </div> <!-- panel -->

<?php
$sql = "SELECT c.*, b.lreg_usr_fname as oname , b.lum_id as olum,  l.lreg_usr_fname as tname, l.lum_id as tlum   FROM d_approve_chat c
left join b_sm_logins b on c.ch_lum_id_1 = b.lum_id
left join b_sm_logins l on c.ch_lum_id_2 = l.lum_id

where b.lum_valid = 1 and l.lum_valid =1 and
ch_valid =1 and ch_lum_id_1 = ".$_USER['lum_id']."  and ch_a = 1 order by ch_dnt desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
?>
                    <a href="chat_so.php?id=<?php echo md5(sha1($row['tlum'])) ?>">
                    <div class="col-sm-3">
                        <div class="panel">
                            <div class="panel-body p-t-10">
                                <div class="media-main">
                                    <div class="info">
                                        <h4><?php echo $row['tname'] ?></h4>
                                    </div>
                                </div>                                
                            </div> <!-- panel-body -->
                        </div> <!-- panel -->
                        </div> <!-- col -->
                    </a> <!-- -->

<?php
    }
} else {
    echo "0";
}

?>

<hr>




                    <div class="col-xs-12">
                        <div class="panel">
                            <div class="panel-body p-t-10">
                                <div class="media-main">
                                    <div class="info">
                                        <h4>Waiting for Approval</h4>
                                    </div>
                                </div>                                
                            </div> <!-- panel-body -->
                        </div> <!-- panel -->

</div>
<?php
$sql = "SELECT c.*, b.lreg_usr_fname as oname , b.lum_id as olum,  l.lreg_usr_fname as tname, l.lum_id as tlum   FROM d_approve_chat c
left join b_sm_logins b on c.ch_lum_id_1 = b.lum_id
left join b_sm_logins l on c.ch_lum_id_2 = l.lum_id

where b.lum_valid = 1 and l.lum_valid =1 and
ch_valid =1 and ch_lum_id_1 = ".$_USER['lum_id']." and ch_a = 0 order by ch_dnt desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
?>
                    <div class="col-sm-3">
                        <div class="panel">
                            <div class="panel-body p-t-10">
                                <div class="media-main">
                                    <div class="info">
                                        <h4><?php echo $row['tname'] ?></h4>
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

<hr>



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
 
        




    </body>

</html>
