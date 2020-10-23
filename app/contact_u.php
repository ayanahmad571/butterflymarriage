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



<?php 
if(isset($_GET['sent'])){
	?>
                <div class="row">
                    <!-- Basic example -->
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            A message has been sent to the Administrator!<br>
We will get back to you shortly</div><!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col-->
                </div>
    <?php
}else{
?>
                <div class="row">
                    <!-- Basic example -->
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h3 class="panel-title">Send a message to the Administrator </h3></div>
                            <div class="panel-body">
                                <form role="form" action="master_action.php" method="post">
                                    <div class="form-group">
                                        <label for="Input1">Subject</label>
                                        <input type="text" name="c_subject" class="form-control" id="Input1" placeholder="Enter Subject">
                                    </div>
                                    <div class="form-group">
                                        <label for="texttt">Message</label>
                                        <textarea name="c_message" class="form-control" id="texttt" placeholder="Enter Message Here"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-purple">Submit</button>
                                </form>
                            </div><!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col-->
                </div>
<hr>
Open Tickets
<hr>


<?php }?>


<?php
$sql = "SELECT * FROM d_contact_master where c_valid =1 and c_status=0 and c_rel_lum_id = ".$_USER['lum_id']." order by c_dnt desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
?>
                    <a href="contact_so.php?id=<?php echo md5(sha1($row['c_id'])) ?>"><div class="col-sm-6">
                        <div class="panel">
                            <div class="panel-body p-t-10">
                                <div class="media-main">
                                    <div class="info">
                                        <h4><?php echo $row['c_title'] ?></h4>
                                        <p class="text-muted"><?php echo date('d-m-Y', $row['c_dnt']) ?></p>
                                    </div>
                                </div>                                
                            </div> <!-- panel-body -->
                        </div> <!-- panel -->
                    </div></a> <!-- end col -->

<?php
    }
} else {
    echo "0 results";
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
