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

<?php if(isset($_GET['id']) and ctype_alnum($_GET['id'])){
		$c = getdatafromsql($conn, "SELECT * FROM d_contact_master c left join b_sm_logins l on c.c_rel_lum_id = l.lum_id 
		where c_valid =1 and md5(c_id) = '".$_GET['id']."' and lum_valid =1 ");

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
                                    Messages
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
                                                    <th>From</th>
                                                    <th>Message</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php 
$sql = "SELECT * from d_contact_messages where m_valid = 1 and m_rel_c_id = ".$c['c_id']." order by m_dnt desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	$rrr = 1;
    while($row = $result->fetch_assoc()) {

?>
                                                <tr>
                                                    <td><?php echo $rrr; ?></td>
                                                    <td><?php 
													if($row['m_send_rel_lum_id'] == $_USER['lum_id']){
													echo "You";}else{echo $c['lreg_usr_fname'];}
													?></td>
                                                    <td><?php echo $row['m_text']; ?></td>
                                                    <td><?php echo date('d-m-Y', $row['m_dnt'])?></td>
                                                </tr>

<?php
$rrr++;

    }
} else {
    echo "0 results";
}

?>

                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                <div class="row">
                    <!-- Basic example -->
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h3 class="panel-title">Send reply to the <?php echo $c['lreg_usr_fname']; ?> </h3></div>
                            <div class="panel-body">
                                <form role="form" action="master_action.php" method="post">
                                        <input type="hidden" name="r_c_id" value="<?php echo $_GET['id'] ?>" >
                                    <div class="form-group">
                                        <label for="texttt">Message</label>
                                        <textarea name="r_message" class="form-control" id="texttt" placeholder="Enter Message Here"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-purple">Submit</button>
                                </form>
                            </div><!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col-->
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
