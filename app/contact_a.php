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


<div class="row">
<div class="portlet"><!-- /primary heading -->
                            <div class="portlet-heading">
                                <h3 class="portlet-title text-dark text-uppercase">
                                    Users
                                </h3>
                                <div class="clearfix"></div>
                            </div>
                            <div id="portlet2" class="panel-collapse collapse in">
                                <div class="portlet-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Message</th>
                                                    <th>Date</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php 
$sql = "SELECT * from d_contact_master c
left join b_sm_logins l on c.c_rel_lum_id = l.lum_id 
where c_valid = 1 
group by c_rel_lum_id 
order by c_dnt asc ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	$rrr = 1;
    while($row = $result->fetch_assoc()) {

?>
                                                <tr>
                                                    <td><?php echo $rrr; ?></td>
                                                    <td><?php echo $row['lreg_usr_fname']; ?></td>
                                                    <td><?php echo $row['c_title']; ?></td>
                                                    <td><?php echo date('d-m-Y', $row['c_dnt'])?></td>
                                                    <td><a href="contact_a_threads.php?id=<?php echo md5($row['c_rel_lum_id']); ?>">
                                                    <button class="btn 	btn-success">View</button>
                                                    </a></td>
                                                </tr>

<?php
$rrr++;

    }
} else {
    echo "0 results";
	die($conn->error);
}

?>

                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

</div>
                 <!-- end row -->

            </div>
            
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
