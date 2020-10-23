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
                                <h3 class="panel-title">Approve Chats</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <!-- -->

 <?php 
 
 $sql = "
 
 SELECT c.*, b.lreg_usr_fname as oname , b.lum_id as olum,  l.lreg_usr_fname as tname, l.lum_id as tlum   FROM d_approve_chat c
left join b_sm_logins b on c.ch_lum_id_1 = b.lum_id
left join b_sm_logins l on c.ch_lum_id_2 = l.lum_id

where b.lum_valid = 1 and l.lum_valid =1 and
ch_valid =1 and ch_a = 0 order by ch_dnt desc
";
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
                                        <h4><?php echo "<strong>".$row['oname']."</strong> wants to connect with <strong>".$row['tname']."</strong>" ?></h4>
                                        <form action="master_action.php" method="post">
                                        <input type="hidden" name="app_id" value="<?php echo md5(md5($row['ch_id'])) ?>" />
                                        <input type="submit" value="Approve" class="btn btn-success" />
                                        </form>
                                    </div>
                                </div>                                
                            </div> <!-- panel-body -->
                        </div> <!-- panel -->
                        </div> <!-- col -->

<?php

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

                    
                </div>
                
                
                
                
                
                <div class="col-lg-12	">

                        <div class="panel panel-default"><!-- /primary heading -->
                            <div class="portlet-heading">
      
                            <div class="panel-heading">
                                <h3 class="panel-title">View Conversations</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <!-- -->

 <?php 
 
 $sql = "
SELECT c.*, a.lreg_usr_fname as oname,  b.lreg_usr_fname as tname FROM `d_approved_chat_messages` c
left join b_sm_logins a on c.`cam_rel_from_lum_id` = a.lum_id
left join b_sm_logins b on c.`cam_rel_to_lum_id` = b.lum_id

WHERE a.lum_valid = 1 and b.lum_valid =1 and `cam_valid` =1 group by cam_hash";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

?>
                    <a href="admin_chat_view.php?id=<?php echo $row['cam_hash'] ?>"><div class="col-sm-3">
                        <div class="panel">
                            <div class="panel-body p-t-10">
                                <div class="media-main">
                                    <div class="info">
                                        <h4><?php echo $row['oname'].' and '.$row['tname'] ?></h4>
                                    </div>
                                </div>                                
                            </div> <!-- panel-body -->
                        </div> <!-- panel -->
                        </div></a> <!-- col -->

<?php

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

                    
                </div>
                
                
                

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
