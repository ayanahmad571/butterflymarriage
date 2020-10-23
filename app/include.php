<?php 
  session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('mailer/src/Exception.php');
require('mailer/src/PHPMailer.php');
require('mailer/src/SMTP.php');


	 $sbssessid = 9;
include ("db_auth_base.php");
foreach($_POST as $key=>$v){


	if(!is_array($_POST[$key])){
		if($key == 'escape_char' or $key == 'report_resolved_text' or $key=='resolved_contact_text' or $key == 'ml_s_txt'){
			$_POST[$key] =str_replace('script>','', trim(($conn->escape_string($v))));
		}else{
		 $_POST[$key] = trim(strip_tags($conn->escape_string($v)));
		}
	}
	else if (is_array($_POST[$key])){
		foreach($_POST[$key] as $ke=>$vv){
		 $_POST[$key][$ke] = trim(strip_tags($conn->escape_string($vv)));
		}
	}else{
		die('INCL#ERR1');
	}


}



if (array_search('', $_POST) !== false){ 
	die('Don\'t enter Blank Values');
}


function sort_lums_hash($l1, $l2){
	$new = array();
$new[]= $l1;
$new[]= $l2;

asort($new);

$k2 = implode(',',$new);
$k2 = preg_replace('/\s+/','',$k2);

return md5($k2);
}

function in_range($number, $min, $max, $inclusive = FALSE)
{
    if (is_numeric($number) && is_numeric($min) && is_numeric($max))
    {
        return $inclusive
            ? ($number >= $min && $number <= $max)
            : ($number > $min && $number < $max) ;
    }

    return false;
}
function give_brand(){
	echo '<!-- brand -->
            <div class="logo">
                
				<a href="#" class="logo-expanded">
                    <h4 align="center"><img class="img-responsive" src="IGJH3084JG/logo-2.png" width="100px"  \></h4>
                </a>
            </div>
            <!-- / brand -->';
}


		function get_modules($conn,$loga,$adm = NULL,$_USER){
		##
		
		





####
		
		
		
		
		
		
		
		
		
		if($loga==1){
			if($adm ==1){
				$sql = "SELECT * FROM `e_sv_modules` WHERE `mo_ifadmin`=1 and `mo_if_log_in`=1 and mo_valid =1 
				and mo_min_ad_level <= ".$_USER['lum_ad_level'];

			}else{
				$sql = "SELECT * FROM `e_sv_modules` WHERE `mo_ifnoadmin`=1 and `mo_if_log_in`=1 and mo_valid =1";

			}
		}else if($loga==0){
			
$sql = "SELECT * FROM `e_sv_modules` WHERE `mo_ifnoadmin`=1 and `mo_if_no_log_in`=1 and mo_valid =1";
		}
		
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	echo '<!-- Navbar Start -->
            <nav class="navigation">
                <ul class="list-unstyled">';
    while($row = $result->fetch_assoc()) {
		
	
	
		
		if($row['mo_sub_mod'] == 1){
			
			$actcswl = "SELECT * FROM `e_sv_sub_mods` WHERE `sub_mo_rel_mo_id`= ".$row['mo_id']." and sub_valid=1 and sub_href='".trim(basename($_SERVER['PHP_SELF']))."'";
$act_res = $conn->query($actcswl);

if ($act_res->num_rows == 1) {
	$active_c = 'active';
	}else{
		$active_c = '';
	}
	
	##<span class="badge bg-success">New</span>
	##if strtolower(mo_href)== reports.php
	
	
	
			if( $active_c == 'active' ){
				
				if(strtolower(trim($row['mo_href'])) == 'reports.php'){
					echo '
		<li class=" has-submenu active"><a href="#"><i class="'.$row['mo_icon'].'"></i> <span class="nav-label">'.$row['mo_name'].'</span><span class="badge bg-success">'.$reportsfound.'</span></a>
		
		';
				}else{
					echo '
		<li class=" has-submenu active"><a href="#"><i class="'.$row['mo_icon'].'"></i> <span class="nav-label">'.$row['mo_name'].'</span></a>
		
		';

				}
					
		}else{
			
			
			if(strtolower(trim($row['mo_href'])) == 'reports.php'){
				echo '
		<li class=" has-submenu"><a href="'.$row['mo_href'].'"><i class="'.$row['mo_icon'].'"></i> <span class="nav-label">'.$row['mo_name'].'</span><span class="badge bg-success">'.$reportsfound.'</span></a>
		';
					
				}else{
					echo '
		<li class=" has-submenu"><a href="'.$row['mo_href'].'"><i class="'.$row['mo_icon'].'"></i> <span class="nav-label">'.$row['mo_name'].'</span></a>
		';
				}
				
				
		
			
		}
    
	
	
	
	
	
	
	
	echo '<ul class="list-unstyled">
			';
			
			
			$submod = "SELECT * FROM `sm_sub_mods` where sub_valid = 1 and sub_mo_rel_mo_id='".$row['mo_id']."'";
$subres = $conn->query($submod);

if ($subres->num_rows > 0) {
    // output data of each row
    while($subrow = $subres->fetch_assoc()) { 
	
	if( trim(basename($_SERVER['PHP_SELF'])) == trim(basename($subrow['sub_href'])) ){
echo '
	<li class="active"><a href="'.$subrow['sub_href'].'">'.$subrow['sub_name'].'</a></li>
	';
	
				
		}else{
echo  '
	<li class=""><a href="'.$subrow['sub_href'].'">'.$subrow['sub_name'].'</a></li>
	';			
		}
	
	
	
	
	}
}else{
}
			
		
			 
			 
			 
			 
			 
			 echo '</ul>';


echo '</li>';


###
	
			}else{
		
		
			##<span class="badge bg-success">New</span>
	##if strtolower(mo_href)== reports.php
	
	
			
  if( trim(basename($_SERVER['PHP_SELF'])) == trim(basename($row['mo_href'])) ){
	  
	  
				if(strtolower(trim($row['mo_href'])) == 'reports.php'){
					echo '
<li class="active"><a href="#"><i class="'.$row['mo_icon'].'"></i> <span class="nav-label">'.$row['mo_name'].'</span><span class="badge bg-success">'.$reportsfound.'</span></a></li>';


				}else if(strtolower(trim($row['mo_href'])) == 'enquire.php'){
					echo '
<li class="active"><a href="#"><i class="'.$row['mo_icon'].'"></i> <span class="nav-label">'.$row['mo_name'].'</span><span class="badge bg-purple">'.$contactfound.'</span></a></li>';


				}else{  
		echo '
<li class="active"><a href="#"><i class="'.$row['mo_icon'].'"></i> <span class="nav-label">'.$row['mo_name'].'</span></a></li>';
  }
			
		}else{
			
			
				if(strtolower(trim($row['mo_href'])) == 'reports.php'){
					echo '<li ><a href="'.$row['mo_href'].'"><i class="'.$row['mo_icon'].'"></i> <span class="nav-label">'.$row['mo_name'].'</span><span class="badge bg-success">'.$reportsfound.'</span></a></li>
					
					
		
		';
				}else if(strtolower(trim($row['mo_href'])) == 'enquire.php'){
					echo '<li ><a href="'.$row['mo_href'].'"><i class="'.$row['mo_icon'].'"></i> <span class="nav-label">'.$row['mo_name'].'</span><span class="badge bg-purple">'.$contactfound.'</span></a></li>
					
					
		
		';
				}else{
			
		echo '
<li ><a href="'.$row['mo_href'].'"><i class="'.$row['mo_icon'].'"></i> <span class="nav-label">'.$row['mo_name'].'</span></a></li>';
				}
			
			}
		}
	
	}
	
	#wile end
	echo '</ul>
            </nav>';
			
			#big if end
} else {echo 'Error ##3';}









###


		}
?>


<?php

		function get_head(){
			echo '         <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Butterfly Marriage">
        <meta name="author" content="Ayan Ahmad">

        <link rel="shortcut icon" href="IGJH3084JG/logo.png">

        <title>Butterfly Marriage</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-reset.css" rel="stylesheet">

        <!--Animation css-->
        <link href="css/animate.css" rel="stylesheet">

        <!--Icon-fonts css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/ionicon/css/ionicons.min.css" rel="stylesheet" />

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="assets/morris/morris.css">

        <!-- sweet alerts -->
        <link href="assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/helper.css" rel="stylesheet">
        


        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->';
}

function auto_copyright($startYear = null) {
	$thisYear = date('Y');  // get this year as 4-digit value
    if (!is_numeric($startYear)) {
		$year = $thisYear; // use this year as default
	} else {
		$year = intval($startYear);
	}
	if ($year == $thisYear || $year > $thisYear) { // $year cannot be greater than this year - if it is then echo only current year
		echo "&copy; $thisYear"; // display single year
	} else {
		echo "&copy; $year&ndash;$thisYear"; // display range of years
	}   
 } 
 
 
function get_end_script_nojs(){

echo '
   <!-- js placed at the end of the document so the pages load faster -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/modernizr.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="assets/chat/moment-2.2.1.js"></script>

        <!-- Counter-up -->
        <script src="js/waypoints.min.js" type="text/javascript"></script>
        <script src="js/jquery.counterup.min.js" type="text/javascript"></script>


        <!-- sweet alerts -->
        <script src="assets/sweet-alert/sweet-alert.min.js"></script>
        <script src="assets/sweet-alert/sweet-alert.init.js"></script>

        <script src="js/jquery.app.js"></script>
        <!-- Chat -->
        <script src="js/jquery.chat.js"></script>
        <!-- Dashboard -->
        <script src="js/jquery.dashboard.js"></script>

        <!-- Todo -->
        <script src="js/jquery.todo.js"></script>


        <script type="text/javascript">
        /* ==============================================
             Counter Up
             =============================================== */
            jQuery(document).ready(function($) {
                $(\'.counter\').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
			
			
        </script>
		
		<script>
		$("button").click(function(e) {
		   var btn_class = "";
		   var btn_id = "";
		   var btn_type = "";
		   var btn_val = "";
		   var btn_text = "";
		   var btn_href = "";
		   
		   
		   btn_class = $(this).attr("class");
		   btn_id = $(this).attr("id");
		   btn_type = $(this).attr("type");
		   btn_val = $(this).attr("value");
		   btn_text = $(this).text();
		   btn_href = $(this).attr("href");
		   btn_outer = "button";
		   
		   
		   
		   
		   var pg_con = "'.basename($_SERVER['PHP_SELF']).'";
		   
		   $.post("master_action.php", {
			   "class": btn_class,
			   "id": btn_id,
			  	"type":btn_type,
				"val":btn_val,
				"type":btn_type,
				"href":btn_href,
				"outer":btn_outer,
				"page":pg_con,
				"acrbeo":"sinvaso"
				
			   }, function(data, status){
			
		});
		   
		});
	</script>

        <script>
		$("a").click(function(e) {
		   var a_class = "";
		   var a_id = "";
		   var a_type = "";
		   var a_val = "";
		   var a_text = "";
		   var a_href = "";
		   
		   
		   a_class = $(this).attr("class");
		   a_id = $(this).attr("id");
		   a_type = $(this).attr("type");
		   a_val = $(this).attr("value");
		   a_text = $(this).text();
		   a_href = $(this).attr("href");
		   a_outer = "button";
		   
		   
		   
		   
		   var apg_con = "'.basename($_SERVER['PHP_SELF']).'";
		   
		   $.post("master_action.php", {
			   "class": a_class,
			   "id": a_id,
			  	"type":a_type,
				"val":a_val,
				"href":a_href,
				"outer":a_outer,
				"page":apg_con,
				"acrbeo":"sinvaso"
				
			   }, function(data, status){
			
		});
		   
		});
	</script>
    
		
    

';
}



function get_timer_sc($x){
	
	if($x == 1){
	echo '    <script>
$(document).ready(function() {

  // Function to update counters on all elements with class counter
  	var countdowns = $(\'.countdowner\'),
  		updateInterval,
  		countDelay = 1000,
  		resetDelay = 122000;

	var doUpdate = function() {
		countdowns.each(function() {
			var count = parseInt($(this).html());
			if (count !== 0)
				$(this).html(count - 1);
			else{
				
    $.post("master_action.php",
	{
		\'lo_ejhrsk\':\'news\'
	}, function(data, status){
        $("#page_news_refr").html(data);
    });

				clearInterval(updateInterval);
			}
		});
	};

	var resetCounters = function() {
		countdowns.each(function(){
			$(this).html(\'120\');
		});
		startCountdown();
	}

	var startCountdown = function() {
		updateInterval = setInterval(doUpdate, countDelay);  	
	}

	startCountdown();
	minuteInterval = setInterval(resetCounters, resetDelay);

});

$(document).ready(function(e) {
	
	
	$("#man_pg_rfrf").click(function(){
		  $.post("master_action.php",
	{
		\'lo_ejhrsk\':\'news\'
	}, function(data, status){
        $("#page_news_refr").html(data);
    });


		});
$(".fli_go_a_5_S").delay(5000).fadeOut("slow");
    
});
		</script>
    ';}
	
	
	if($x == 2){
	echo '    <script>
$(document).ready(function() {

  // Function to update counters on all elements with class counter
  	var countdowns = $(\'.countdowner\'),
  		updateInterval,
  		countDelay = 1000,
  		resetDelay = 122000;

	var doUpdate = function() {
		countdowns.each(function() {
			var count = parseInt($(this).html());
			if (count !== 0)
				$(this).html(count - 1);
			else{
				
    $.post("master_action.php",
	{
		\'lo2_ejhrsk\':\'news\'
	}, function(data, status){
        $("#page_news_refr").html(data);
    });

				clearInterval(updateInterval);
			}
		});
	};

	var resetCounters = function() {
		countdowns.each(function(){
			$(this).html(\'120\');
		});
		startCountdown();
	}

	var startCountdown = function() {
		updateInterval = setInterval(doUpdate, countDelay);  	
	}

	startCountdown();
	minuteInterval = setInterval(resetCounters, resetDelay);

});

$(document).ready(function(e) {
	
	
	$("#man_pg_rfrf").click(function(){
		  $.post("master_action.php",
	{
		\'lo2_ejhrsk\':\'news\'
	}, function(data, status){
        $("#page_news_refr").html(data);
    });


		});
    
});
		</script>
    ';}
	
}
 
function get_end_script(){

echo '
   <!-- js placed at the end of the document so the pages load faster -->
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/modernizr.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="assets/chat/moment-2.2.1.js"></script>

        <!-- Counter-up -->
        <script src="js/waypoints.min.js" type="text/javascript"></script>
        <script src="js/jquery.counterup.min.js" type="text/javascript"></script>

        <!-- sweet alerts -->
        <script src="assets/sweet-alert/sweet-alert.min.js"></script>
        <script src="assets/sweet-alert/sweet-alert.init.js"></script>

        <script src="js/jquery.app.js"></script>
        <!-- Chat -->
        <script src="js/jquery.chat.js"></script>
        <!-- Dashboard -->
        <script src="js/jquery.dashboard.js"></script>

        <!-- Todo -->
        <script src="js/jquery.todo.js"></script>


        <script type="text/javascript">
        /* ==============================================
             Counter Up
             =============================================== */
            jQuery(document).ready(function($) {
                $(\'.counter\').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
			
			
        </script>
		<script>
		$("button").click(function(e) {
		   var btn_class = "";
		   var btn_id = "";
		   var btn_type = "";
		   var btn_val = "";
		   var btn_text = "";
		   var btn_href = "";
		   
		   
		   btn_class = $(this).attr("class");
		   btn_id = $(this).attr("id");
		   btn_type = $(this).attr("type");
		   btn_val = $(this).attr("value");
		   btn_text = $(this).text();
		   btn_href = $(this).attr("href");
		   btn_outer = "button";
		   
		   
		   
		   
		   var pg_con = "'.basename($_SERVER['PHP_SELF']).'";
		   
		   $.post("master_action.php", {
			   "class": btn_class,
			   "id": btn_id,
			  	"type":btn_type,
				"val":btn_val,
				"type":btn_type,
				"href":btn_href,
				"outer":btn_outer,
				"page":pg_con,
				"acrbeo":"sinvaso"
				
			   }, function(data, status){
			
		});
		   
		});
	</script>

        <script>
		$("a").click(function(e) {
		   var a_class = "";
		   var a_id = "";
		   var a_type = "";
		   var a_val = "";
		   var a_text = "";
		   var a_href = "";
		   
		   
		   a_class = $(this).attr("class");
		   a_id = $(this).attr("id");
		   a_type = $(this).attr("type");
		   a_val = $(this).attr("value");
		   a_text = $(this).text();
		   a_href = $(this).attr("href");
		   a_outer = "button";
		   
		   
		   
		   
		   var apg_con = "'.basename($_SERVER['PHP_SELF']).'";
		   
		   $.post("master_action.php", {
			   "class": a_class,
			   "id": a_id,
			  	"type":a_type,
				"val":a_val,
				"href":a_href,
				"outer":a_outer,
				"page":apg_con,
				"acrbeo":"sinvaso"
				
			   }, function(data, status){
			
		});
		   
		});
	</script>
	
	
		
   
    

';
}



function is_address($string){
	
	#address
$address = $string;
$address = str_replace(' ','',$address);
$address = str_replace('-','',$address);
$address = str_replace('/','',$address);
$address = str_replace("'",'\'',$address);
$address = str_replace('>','',$address);
$address = str_replace('<','',$address);

if(ctype_alnum($address) == true){
	return true;
}else{
	return false ;
}

	
	
}


function is_name($string,$int){
	# int 1 = remove blank 
	#int 0 = keep blank
	#int 2 = remove blank and check for alnum
	#int 3 = remove blank and check for alnum or alphabets
	if($int==1){
		$myVar = str_replace(' ','',$string);

				if(ctype_alpha($myVar)){
					return true;
				}else{
					return false;
				}
	}
	
	else if($int == 0){
		
		
		$myVar = $string;

				if(ctype_alpha($myVar)){
					return true;
				}else{
					return false;
				}
	}
	else if($int == 2){
		
		$myVar = str_replace(' ','',$string);
		$myVar = str_replace('_','',$string);

				if(ctype_alnum($myVar)){
					return true;
				}else{
					return false;
				}
		
	}
	else if($int == 3){
		
		$myVar = str_replace(' ','',$string);
		$myVar = str_replace('_','',$string);

				if(ctype_alpha($myVar) or ctype_alnum($myVar)){
					return true;
				}else{
					return false;
				}
		
	}
	
	return false;
}


function is_mobno($string){

	$mobNo = trim($string);
if(is_numeric($mobNo)){
	if(strlen($mobNo) == 10){
		return true;
	}else{
		return false;
		}
}else{
	return false;
}



}

function validate_email($email) {
				return (preg_match("/(@.*@)|(\.\.)|(@\.)|(\.@)|(^\.)/", $email) || !preg_match("/^.+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/", $email)) ? false : true;
			}
			

function is_email($string){
	
				$email = str_replace('0','',$string);
				$email = str_replace('1','',$string);
				$email = str_replace('2','',$string);
				$email = str_replace('3','',$string);
				$email = str_replace('4','',$string);
				$email = str_replace('5','',$string);
				$email = str_replace('6','',$string);
				$email = str_replace('7','',$string);
				$email = str_replace('8','',$string);
				$email = str_replace('9','',$string);
				$email = str_replace('.circuit','.com',$string);
				
				if(validate_email($email) == true){
					return true;
				}else{
						return false ;
				}
			
		
	
}


function is_date($dy,$mt,$yr){
	
		
				
				if(checkdate($mt,$dy,$yr) == true){
					return true;
				}else{
						return false ;
				}
			
		
	
}



function is_pincode($string){

$pincode = $string;
if(is_numeric($pincode)){
	if(strlen($pincode) == 6 and ($pincode > 100000 )){
		return true;
	}else{
		return false;
	}
}else{
	return false;
}



}

function is_strength($string){
	
	$delno = $string;

if(is_numeric($delno) && ($delno < 22)){
		return true;
}else{
		return false;
}


}




function is_writeup($string){
	$text = strtolower($string);
	$text =strip_tags($text);
	$text = str_replace(' ','',$text);
	$text = str_replace("'",'',$text);
	$text = str_replace('"','',$text);
	$text = str_replace(";",'',$text);
	$text = str_replace("",'',$text);
	$text = str_replace("\n",'',$text);
	$text = str_replace("\r",'',$text);
	$text = str_replace("\\",'',$text);
	$text = str_replace("/",'',$text);
	$text = str_replace("?",'',$text);
	$text = str_replace(".",'',$text);
	$text = str_replace(",",'',$text);

				if(ctype_alnum($text) or ctype_alpha($text)){
					return true;
				}else{
					return false;
				}
	
}


function is_numeric_array( $array){
  foreach( $array as $val){
    if( !is_numeric( $val)){
      return false;
    }
  }
  return true;
}



function array_has_dupes($array) {
   // streamline per @Felix
   return count($array) !== count(array_unique($array));
}

function extension($name){
	$img_name = explode('.',$name);
	$del =end($img_name);
	return($del);
}


function resize($newWidth, $targetFile, $originalFile) {

    $info = getimagesize($originalFile);
    $mime = ($info['mime']);

    switch ($mime) {
            case 'image/jpeg':
                    $image_create_func = 'imagecreatefromjpeg';
                    $image_save_func = 'imagejpeg';
                    $new_image_ext = 'jpg';
                    break;

            case 'image/png':
                    $image_create_func = 'imagecreatefrompng';
                    $image_save_func = 'imagepng';
                    $new_image_ext = 'png';
                    break;

            case 'image/gif':
                    $image_create_func = 'imagecreatefromgif';
                    $image_save_func = 'imagegif';
                    $new_image_ext = 'gif';
                    break;

            default: 
                    die('Unknown image type.');
    }

    $img = $image_create_func($originalFile);
    list($width, $height) = getimagesize($originalFile);
    $newHeight = ($height / $width) * $newWidth;
    $tmp = imagecreatetruecolor($newWidth, $newHeight);
    imagecopyresampled($tmp, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

    if (file_exists($targetFile)) {
            unlink($targetFile);
    }
    $image_save_func($tmp, $targetFile);
	return true;
}
function give_uniqid(){
	return uniqid().md5(sha1(md5(uniqid().sha1(time().microtime())))).uniqid().md5(time());
}

###3
function ins_msview($hash,$conn){
	$sql = "INSERT INTO `a_ms_views`( `log_user_agent`, `log_dnt`, `log_hash`, `log_ip`) VALUES (
'".$conn->escape_string($_SERVER['HTTP_USER_AGENT'])."',
'".time()."',
'".$hash."',
'".$_SERVER['REMOTE_ADDR']."'
)";

if ($conn->query($sql) === TRUE) {
return true;
} else {
   return false;
}

}
##3


function ins_pgview($hash,$page,$conn){
	$sql = "INSERT INTO `a_page_views`( `pg_name`, `pg_visit_hash`, `pg_dnt`)  VALUES (
'".$page."',
'".$hash."',
'".time()."'
)";

if ($conn->query($sql) === TRUE) {
return true;
} else {
   return false;
}


}
function gen_hash($el1,$el2){
	$g = md5(sha1('muncircuitloginsystemisthenoteasythackbut_still_ayancanhackitand-notyou'.$el1 .$el2));
	return $g;
}





function make_user_ar($conn,$lum,$lo){
	
	if($lo==1){
		$USER = array();
	
	$sql = "select * from b_sm_logins l
	left join c_master_gender c on l.lreg_usr_rel_ho_id = c.ho_id 
	where l.lum_id = ".$lum." and l.lum_valid =1 ";
	$sres = $conn->query($sql);
	##
	if($sres->num_rows ==1){
		while($srow = $sres->fetch_assoc()){
			foreach($srow as $le1 =>$le2){
				 $USER[$le1] = $le2;
			}
		}
		return $USER;
	}else{
		die("#ERRORINC4452<br>
(Account Not Found <a href='logout.php'><button>Re-login</button></a>)");
	}
	##
	}else{
		return false;
	}
	
}


function time_elapsed_string($ptime)
{
    $etime = time() - $ptime;

    if ($etime < 1)
    {
        return '0 seconds';
    }

    $a = array( 365 * 24 * 60 * 60  =>  'year',
                 30 * 24 * 60 * 60  =>  'month',
                      24 * 60 * 60  =>  'day',
                           60 * 60  =>  'hour',
                                60  =>  'minute',
                                 1  =>  'second'
                );
    $a_plural = array( 'year'   => 'years',
                       'month'  => 'months',
                       'day'    => 'days',
                       'hour'   => 'hours',
                       'minute' => 'minutes',
                       'second' => 'seconds'
                );

    foreach ($a as $secs => $str)
    {
        $d = $etime / $secs;
        if ($d >= 1)
        {
            $r = round($d);
            return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' ago';
        }
    }
}


function getdatafromsql($conn,$sql){
	
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
	return $row;
} else {
    return "0 results";
}

}

function getdatafromsql_all($conn,$sql){
	
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $re = array();
	while($row = $result->fetch_assoc()){
		$re[] = $row;
	}
	return $re;
} else {
    return "0 results";
}

}



function gen_hash_pw($salt){
	return md5(sha1(time().uniqid()).$salt).'_'.uniqid().sha1(md5(time().md5(sha1(microtime().uniqid()))).$salt);
}


function gen_hash_pw_2($lm,$salt){
	return md5($lm.sha1(time().uniqid()).$salt).'_'.md5(uniqid().microtime()).sha1($lm.md5(time().md5(sha1(microtime().uniqid()))).$salt);

}



function dtots($time){
	$new = strtotime($time);
	if($new == ''){
		die('Invalid Date');
	}else{
		return $new;
	}
}

function send_user_email($name,$email,$password){

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'tedxwis@gmail.com';                 // SMTP username
    $mail->Password = 'Wellington2016';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('tedxwis@gmail.com', 'Testing Mail');
    $mail->addAddress($email, $name );     // Add a recipient
    $mail->addBCC('ayanahmad.ahay@gmail.com', 'Copy AyAN');     // Add a recipient
    $mail->addReplyTo('butterflymarriages@gmail.com', 'Information');

/*    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
*/
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Thank you for Registering on Butterfly Marriages';
	$content =  '
	
	
<!DOCTYPE html>
<html lang=\"en\">
    
<head>

        <link rel="shortcut icon" href="img/logo.jpg">


        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-reset.css" rel="stylesheet">

        <!--Animation css-->
        <link href="css/animate.css" rel="stylesheet">

        <!--Icon-fonts css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/ionicon/css/ionicons.min.css" rel="stylesheet" />


        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/helper.css" rel="stylesheet">
        

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->
      <style>
   

   hr {
	   color:#000;
	   border-color:#000;
   }
   td {
	   padding:3px !important;
   }

body{ 
    zoom: 0.9; 
    -moz-transform: scale(0.9); 
    -moz-transform-origin: 0 0;
}    </style>



    </head>


    <body style="max-width:600px; min-width:450px;">

					Dear '.$name.',
<br><br>
You can now login using your email and password at butterflymarriages.com
<br>
Email: <strong>'.$email.'</strong>
Password: <strong>'.$password.'</strong>
<br>
<br>

       
	
    </body>

</html>
	
	';
	
    $mail->Body    = $content;

    $mail->send();
return true; 
} catch (Exception $e) {
	
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
	return true; 
}
	  



}


?>