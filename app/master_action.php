<?php

if(include('include.php')){
}else{
die('##errMASTERofUSErERROR');
}

if(isset($_SESSION['SESS_USR_LOG_MS_VIEW_MD5_ID']) and trim($_SESSION['SESS_USR_LOG_MS_VIEW_MD5_ID']) != ''){
	if(ins_pgview($_SESSION['SESS_USR_LOG_MS_VIEW_MD5_ID'],basename($_SERVER['PHP_SELF']),$conn)){
	}else{
		die('#ERRHOM1');
	}
}else{
	
	#newhash
	session_regenerate_id();
	$_SESSION['SESS_USR_LOG_MS_VIEW_MD5_ID'] = give_uniqid();
	
	if(ins_msview($_SESSION['SESS_USR_LOG_MS_VIEW_MD5_ID'],$conn)){
	}else{
		die('#ERRHOM3');
	}
	#hash pgname 
if(ins_pgview($_SESSION['SESS_USR_LOG_MS_VIEW_MD5_ID'],basename($_SERVER['PHP_SELF']),$conn)){
	}else{
		die('#ERRHOM4');
	}

}






if((count($_POST) > 0)  or (count($_GET) > 0)){
	if((count($_POST) > 0)){
		if(isset($_SERVER['HTTP_REFERER'])){
		}else{
			die('Refferer Not Found');
		}
		if((strpos($_SERVER['HTTP_REFERER'],'http://ahmadanonymous.ddns.net') == '0') or (strpos($_SERVER['HTTP_HOST'],'http://localhost/') == '0') or (strpos($_SERVER['HTTP_REFERER'],'http://192.168.1.') == '0'))
	{
	  //only process operation here
	}else{
		die('Only tld process are allowed');
	}
	}

}else{
	
	die(header('Location: master-action.php'));
	
}
/*
foreach($_POST as $p=>$v){
	echo 
	
'
	############################ <br>
	if(isset($_POST[\''.$p.'\'])){<br>
		$nm = $_POST[\''.$p.'\'];<br>
	}else{<br>
		die(\'Enter '.$p.' Fields Correctly\');<br>
	}<br>
	############################<br><br>


';

}
*/

if(isset($_POST['register_new'])){
	
############################
if(isset($_POST['regu_fname'])){
$user_first_name = $_POST['regu_fname'];
}else{
die('Enter regu_fname Fields Correctly');
}
############################

############################
if(isset($_POST['regu_lname'])){
$user_last_name = $_POST['regu_lname'];
}else{
die('Enter regu_lname Fields Correctly');
}
############################

############################
if(isset($_POST['regu_email']) and is_email($_POST['regu_email'])){
	
$user_email = $_POST['regu_email'];
}else{
die('Enter regu_email Fields Correctly');
}
############################

############################
if(isset($_POST['regu_mob_cc']) and is_numeric($_POST['regu_mob_cc'])){
$user_mobile_code = $_POST['regu_mob_cc'];
}else{
die('Enter regu_mob_cc Fields Correctly');
}
############################

############################
if(isset($_POST['regu_mob_no']) and is_numeric($_POST['regu_mob_no'])){
$user_mobile_number = $_POST['regu_mob_no'];
}else{
die('Enter regu_mob_no Fields Correctly');
}
############################

############################
if(isset($_POST['regu_pw'])){
$user_password = $_POST['regu_pw'];
}else{
die('Enter regu_pw Fields Correctly');
}
############################

############################
if(isset($_POST['regu_gender']) and is_numeric($_POST['regu_gender'])){
	$check = getdatafromsql($conn, "SELECT * FROM `c_master_gender` where ho_id = '".$_POST['regu_gender']."'" );
	if(is_array($check)){
		$user_gender = $_POST['regu_gender'];

	}else{
		die('Invalid Gender');
	}
}else{
die('Enter regu_gender Fields Correctly');
}
############################

############################
if(isset($_POST['regu_height_ft']) and is_numeric($_POST['regu_height_ft'])){
$user_height1 = $_POST['regu_height_ft'];
}else{
die('Enter regu_height_ft Fields Correctly');
}
############################

############################
if(isset($_POST['regu_height_in'])  and is_numeric($_POST['regu_height_in'])){
$user_height2 = $_POST['regu_height_in'];
}else{
die('Enter regu_height_in Fields Correctly');
}
############################

############################
if(isset($_POST['regu_age']) and is_numeric($_POST['regu_age'])){
$user_age = $_POST['regu_age'];
}else{
die('Enter regu_age Fields Correctly');
}
############################

############################
if(isset($_POST['regu_live'])){
$user_live = $_POST['regu_live'];
}else{
die('Enter regu_live Fields Correctly');
}
############################

############################
if(isset($_POST['regu_eth'])){
$user_eth = $_POST['regu_eth'];
}else{
die('Enter regu_eth Fields Correctly');
}
############################

############################
if(isset($_POST['regu_nation'])){
$user_nation = $_POST['regu_nation'];
}else{
die('Enter regu_nation Fields Correctly');
}
############################

############################
if(isset($_POST['regu_marriedb'])){
$user_marry = $_POST['regu_marriedb'];
}else{
die('Enter regu_marriedb Fields Correctly');
}
############################

############################
if(isset($_POST['regu_proff'])){
$user_prof = $_POST['regu_proff'];
}else{
die('Enter regu_proff Fields Correctly');
}
############################

############################
if(isset($_POST['regu_edu'])){
$user_education = $_POST['regu_edu'];
}else{
die('Enter regu_edu Fields Correctly');
}
############################

############################
if(isset($_POST['regu_sparetime'])){
$user_sparetime = $_POST['regu_sparetime'];
}else{
die('Enter regu_sparetime Fields Correctly');
}
############################

############################
if(isset($_POST['regu_pref'])){
$user_prefrnc = $_POST['regu_pref'];
}else{
die('Enter regu_pref Fields Correctly');
}
############################

############################
if(isset($_POST['regu_para'])){
$user_para = $_POST['regu_para'];
}else{
die('Enter regu_para Fields Correctly');
}
############################


$ins_sq= "INSERT INTO `b_sm_users`(`reg_usr_fname`, `reg_usr_lname`, `reg_usr_rel_ho_id`, `reg_usr_email`, `reg_usr_mob_cc`, `reg_usr_mob_no`, `reg_usr_pw`, `reg_usr_height_ft`, `reg_usr_height_in`, `reg_usr_age`, `reg_usr_live`, `reg_usr_eth`, `reg_usr_nation`, `reg_usr_marriedb`, `reg_usr_proff`, `reg_usr_edu`, `reg_usr_sparetime`, `reg_usr_pref`, `reg_usr_para`, `reg_usr_dnt`, `reg_usr_ip`) VALUES (

'".$user_first_name."',
'".$user_last_name."',
'".$user_gender."',
'".$user_email."',
'".$user_mobile_code."',
'".$user_mobile_number."',
'".$user_password."',
'".$user_height1."',
'".$user_height2."',
'".$user_age."',
'".$user_live."',
'".$user_eth."',
'".$user_nation."',
'".$user_marry."',
'".$user_prof."',
'".$user_education."',
'".$user_sparetime."',
'".$user_prefrnc."',
'".$user_para."',
'".time()."',
'".$_SERVER['REMOTE_ADDR']."'

)";


if($conn->query($ins_sq)){

	header('Location: login.php?reg');
}else{
	die("we are currently facing a downtime ret code(MA264)");
}

}
#
#register

if(isset($_POST['ok'])){
	var_dump($_POST);
if( !isset($_POST['usr_pass']) or !isset($_POST['usr_eml'])){
	die('Please Enter all the data');
}



##

$email = $_POST['usr_eml'];

$pw = md5(md5(sha1($_POST['usr_pass'])));


$hash = gen_hash($pw,$email);
#pass and email and secret md5(sha1())


$sqla = "
INSERT INTO `b_sm_logins`(`lum_username`, `lum_password`, `lum_hash`,`lum_valid`) VALUES (
'".trim($email)."',
'".trim($pw)."',
'".trim($hash)."',
'0'
)
";


if ($conn->query($sqla) === TRUE) {
	
    header('Location: login.php');
	
    } else {
    echo  $conn->error."Error###maa4";
}


}
#
#login



#_______________________________START USER_______________________
if(isset($_POST['yh_com']) and isset($_POST['usr_make_ac'])){
	if(ctype_alnum(trim($_POST['yh_com']))){
		$checkit = getdatafromsql($conn,"select * from b_sm_users where 
		md5(md5(sha1(sha1(md5(md5(concat(reg_usr_id,'hir39efnewsfejirjeofkvjrjdnjjenfkvkijonreij3nj'))))))) = '".$_POST['yh_com']."' and reg_usr_valid= 1");
		
		if(is_array($checkit)){
			
			############################
if(isset($_POST['a_fname'])){
$user_first_name = $_POST['a_fname'];
}else{
die('Enter a_fname Fields Correctly');
}
############################

############################
if(isset($_POST['a_lname'])){
$user_last_name = $_POST['a_lname'];
}else{
die('Enter a_lname Fields Correctly');
}
############################

############################
if(isset($_POST['a_email']) and is_email($_POST['a_email'])){
	
$user_email = $_POST['a_email'];
}else{
die('Enter a_email Fields Correctly');
}
############################

############################
if(isset($_POST['a_mob_cc']) and is_numeric($_POST['a_mob_cc'])){
$user_mobile_code = $_POST['a_mob_cc'];
}else{
die('Enter a_mob_cc Fields Correctly');
}
############################

############################
if(isset($_POST['a_mob_no']) and is_numeric($_POST['a_mob_no'])){
$user_mobile_number = $_POST['a_mob_no'];
}else{
die('Enter a_mob_no Fields Correctly');
}
############################

############################
if(isset($_POST['a_pw'])){
$user_password = $_POST['a_pw'];
}else{
die('Enter a_pw Fields Correctly');
}
############################

############################
if(isset($_POST['a_gender']) and is_numeric($_POST['a_gender'])){
	$check = getdatafromsql($conn, "SELECT * FROM `c_master_gender` where ho_id = '".$_POST['a_gender']."'" );
	if(is_array($check)){
		$user_gender = $_POST['a_gender'];

	}else{
		die('Invalid Gender');
	}
}else{
die('Enter a_gender Fields Correctly');
}
############################

############################
if(isset($_POST['a_height_ft']) and is_numeric($_POST['a_height_ft'])){
$user_height1 = $_POST['a_height_ft'];
}else{
die('Enter a_height_ft Fields Correctly');
}
############################

############################
if(isset($_POST['a_height_in'])  and is_numeric($_POST['a_height_in'])){
$user_height2 = $_POST['a_height_in'];
}else{
die('Enter a_height_in Fields Correctly');
}
############################

############################
if(isset($_POST['a_age']) and is_numeric($_POST['a_age'])){
$user_age = $_POST['a_age'];
}else{
die('Enter a_age Fields Correctly');
}
############################

############################
if(isset($_POST['a_live'])){
$user_live = $_POST['a_live'];
}else{
die('Enter a_live Fields Correctly');
}
############################

############################
if(isset($_POST['a_eth'])){
$user_eth = $_POST['a_eth'];
}else{
die('Enter a_eth Fields Correctly');
}
############################

############################
if(isset($_POST['a_nation'])){
$user_nation = $_POST['a_nation'];
}else{
die('Enter a_nation Fields Correctly');
}
############################

############################
if(isset($_POST['a_marriedb'])){
$user_marry = $_POST['a_marriedb'];
}else{
die('Enter a_marriedb Fields Correctly');
}
############################

############################
if(isset($_POST['a_proff'])){
$user_prof = $_POST['a_proff'];
}else{
die('Enter a_proff Fields Correctly');
}
############################

############################
if(isset($_POST['a_edu'])){
$user_education = $_POST['a_edu'];
}else{
die('Enter a_edu Fields Correctly');
}
############################

############################
if(isset($_POST['a_sparetime'])){
$user_sparetime = $_POST['a_sparetime'];
}else{
die('Enter a_sparetime Fields Correctly');
}
############################

############################
if(isset($_POST['a_pref'])){
$user_prefrnc = $_POST['a_pref'];
}else{
die('Enter a_pref Fields Correctly');
}
############################

############################
if(isset($_POST['a_para'])){
$user_para = $_POST['a_para'];
}else{
die('Enter a_para Fields Correctly');
}
############################
		$pw = md5(md5(sha1($_POST['a_pw'])));
$hash = gen_hash($pw, $user_email);

$ins_sq= "
INSERT INTO `b_sm_logins`(`lum_type`, `lum_image`, `lum_username`, `lum_email`, `lum_password`, `lum_hash`, `lum_ad`, `lum_ad_level`,`lreg_usr_fname`, `lreg_usr_lname`, `lreg_usr_rel_ho_id`, `lreg_usr_email`, `lreg_usr_mob_cc`, `lreg_usr_mob_no`, `lreg_usr_pw`, `lreg_usr_height_ft`, `lreg_usr_height_in`, `lreg_usr_age`, `lreg_usr_live`, `lreg_usr_eth`, `lreg_usr_nation`, `lreg_usr_marriedb`, `lreg_usr_proff`, `lreg_usr_edu`, `lreg_usr_sparetime`, `lreg_usr_pref`, `lreg_usr_para`, `lreg_usr_dnt`, `lreg_usr_ip`) VALUES (
'2',
'0',
'".$_POST['a_pw']."',
'".$user_email."',
'".$pw."',
'".$hash."',
'0',
'0',
'".$user_first_name."',
'".$user_last_name."',
'".$user_gender."',
'".$user_email."',
'".$user_mobile_code."',
'".$user_mobile_number."',
'".$user_password."',
'".$user_height1."',
'".$user_height2."',
'".$user_age."',
'".$user_live."',
'".$user_eth."',
'".$user_nation."',
'".$user_marry."',
'".$user_prof."',
'".$user_education."',
'".$user_sparetime."',
'".$user_prefrnc."',
'".$user_para."',
'".time()."',
'".$_SERVER['REMOTE_ADDR']."'

)";



if($conn->query($ins_sq)){
				
			
			if($conn->query("update b_sm_users set reg_usr_gen_rel_lum = ".$conn->insert_id." where reg_usr_id= ".$checkit['reg_usr_id']."")){
				
				
				if(send_user_email($user_first_name.' '.$user_last_name, $user_email, $user_password))
				
								header('Location: admin_user.php');
								
								else{
									die('Mail error');
				}
			}else{
				die('ERRMA3jonkj34oirvfingj');
			}
}else{
	echo $conn->error;
}
			

		}else{
			die("No User Found");
		}
	}else{
		die('Invalid Entries');
	}
}
#
#
if(isset($_POST['yh_com']) and isset($_POST['usr_make_inac'])){
	if(ctype_alnum(trim($_POST['yh_com']))){
		$checkit = getdatafromsql($conn,"select * from b_sm_users where 
		md5(md5(sha1(sha1(md5(md5(concat(reg_usr_id,'hir39efnewsfejirjrjdnjjenfkv ijfkorkvnkorvfk'))))))) = '".$_POST['yh_com']."' and reg_usr_valid = 1");
		
		if(is_array($checkit)){

			if($conn->query("update b_sm_users set reg_usr_valid =0 where reg_usr_id= ".$checkit['reg_usr_id']."")){
				
								header('Location: admin_user.php');
			}else{
				die('ERRMA3joingj');
			}
		}else{
			die("No User Found");
		}
	}else{
		die('Invalid Entries');
	}
}
#
#_______________________________END USER_______________________







if(isset($_POST['uid']) and isset($_POST['email'])){
	
	
	if(!is_email(trim($_POST['email']))){
		die('Invalid email format');
	}
	

	
	
	$uid = trim($_POST['uid']);
	$email = trim($_POST['email']);
	
	$pas=md5(md5(sha1($uid)));
	$hash = gen_hash($pas,$email);
	

	if(ctype_alnum($hash.$pas)){
	}else{
		die("Credentials Not valid");
	}
		$selectusersfromdbsql = "SELECT * FROM b_sm_logins where 
lum_email= '".$email."' and
lum_username = '".$uid."' and
lum_password = '".$pas."' and
lum_hash= '".$hash."' and
lum_valid = 1

";
		
$usrres = $conn->query($selectusersfromdbsql);
if ($usrres->num_rows == 1) {
    // output data of each row
    while($usrrw = $usrres->fetch_assoc()) {
        
		$insqqqqq = "insert into 
		`b_sv_auth_pass`(`ap_email`,`ap_rel_lum_id`,
		`ap_lin`,`ap_lot`,`ap_sess_hash`,`ap_ip`,`ap_dnt`) 
		VALUES(
		'".$email."',
		'".$usrrw['lum_id']."',
		'1',
		'0',
		'".$_SESSION['SESS_USR_LOG_MS_VIEW_MD5_ID']."',
		'".$_SERVER['REMOTE_ADDR']."',
		'".time()."'
		)";
		if($conn->query($insqqqqq)){
		
		session_regenerate_id();
		
		
		$_SESSION['BMARRIAGE_SESS_ID'] = md5(sha1(md5(md5(sha1('083qrhjedfj0248ure42i0h 282uwehfiuh 2h482t4hu4e9whfu428oyqeiuwfhjfdjbf9h759eyt20hojrfbmisk834ui')).uniqid().time()).time()).uniqid());
		$_SESSION['BMRG_USR_DB_ID'] = $usrrw['lum_id'];
		session_write_close();
		
			header('Location: home.php');
			die();
		
    	}else{
			die("ERRMAinffgveiu");
		}
	}
} else {
	
	
	################################################################################33##
							
									header('Location: login.php?errflag_li');

		
	
	
	}
	
	
		
}
#
#


	$serverdir = 'http://sbsvote.ddns.net/';

#
#
if(isset($_POST['mod_add'])){
	if(isset($_SESSION['BMRG_USR_DB_ID'])){
		$getdatus = getdatafromsql($conn,"select * from b_sm_logins where lum_id = ".$_SESSION['BMRG_USR_DB_ID']." and lum_valid = 1 and lum_ad = 1");
		if(is_string($getdatus)){
			die('Access Denied');
		}
	}else{
		die('Login to do this action');
	}
	############################33333333
	if(isset($_POST['mod_a_long_name'])){
		$nm = $_POST['mod_a_long_name'];
	}else{
		die('Enter all Fields Correctly');
	}
	############################33333333
	if(isset($_POST['mod_a_href'])){
		$href = $_POST['mod_a_href'];
	}else{
		die('Enter all Fields Correctly');
	}
	############################33333333
	if(isset($_POST['mod_a_icon'])){
		$ico = $_POST['mod_a_icon'];
	}else{
		die('Enter all Fields Correctly');
	}
	############################33333333
	if(isset($_POST['mod_a_sub_menu']) and is_numeric($_POST['mod_a_sub_menu'])){
		if(in_range($_POST['mod_a_sub_menu'],0,1,true)){
		}else{
			die('Values other than 1 or 0 are not allowed 1');
		}
		$subm = $_POST['mod_a_sub_menu'];
	}else{
		die('Enter all Fields Correctly');
	}
	############################33333333
	if(isset($_POST['mod_a_ifadmin']) and is_numeric($_POST['mod_a_ifadmin'])){
		if(in_range($_POST['mod_a_ifadmin'],0,1,true)){
		}else{
			die('Values other than 1 or 0 are not allowed 2');
		}
		$ifadm = $_POST['mod_a_ifadmin'];
	}else{
		die('Enter all Fields Correctly');
	}
	############################33333333
	if(isset($_POST['mod_a_ifnotadmin']) and is_numeric($_POST['mod_a_ifnotadmin'])){
		if(in_range($_POST['mod_a_ifnotadmin'],0,1,true)){
		}else{
			die('Values other than 1 or 0 are not allowed 3');
		}
		$ifnoadm = $_POST['mod_a_ifnotadmin'];
	}else{
		die('Enter all Fields Correctly');
	}
	############################33333333
	if(isset($_POST['mod_a_ifnotlogin']) and is_numeric($_POST['mod_a_ifnotlogin'])){
		if(in_range($_POST['mod_a_ifnotlogin'],0,1,true)){
		}else{
			die('Values other than 1 or 0 are not allowed 4');
		}
		$ifnlogin = $_POST['mod_a_ifnotlogin'];
	}else{
		die('Enter all Fields Correctly');
	}
	############################33333333mod_a_minadl
	if(isset($_POST['mod_a_iflogin']) and is_numeric($_POST['mod_a_iflogin'])){
		if(in_range($_POST['mod_a_ifadmin'],0,1,true)){
		}else{
			die('Values other than 1 or 0 are not allowed 5');
		}
		$iflogin = $_POST['mod_a_iflogin'];
	}else{
		die('Enter all Fields Correctly');
	}
	############################33333333
	if(isset($_POST['mod_a_minadl']) and is_numeric($_POST['mod_a_minadl'])){
		if(in_range($_POST['mod_a_minadl'],0,10,true)){
		}else{
			die('Values other than 10 to 0 are not allowed 7');
		}
		$minada = $_POST['mod_a_minadl'];
	}else{
		die('Enter all Fields Correctly');
	}
	############################33333333
	if(isset($_POST['mod_a_valid']) and is_numeric($_POST['mod_a_valid'])){
		if(in_range($_POST['mod_a_valid'],0,1,true)){
		}else{
			die('Values other than 1 or 0 are not allowed 6');
		}
		$vali_s = $_POST['mod_a_valid'];
	}else{
		die('Enter all Fields Correctly');
	}
	############################33333333

	if($conn->query("INSERT INTO `e_sv_modules`(`mo_name`, `mo_href`, `mo_icon`, `mo_ifadmin`, `mo_ifnoadmin`, `mo_if_no_log_in`, `mo_if_log_in`,`mo_min_ad_level` , `mo_sub_mod`, `mo_valid`) VALUES (
	'".$nm."',
	'".$href."',
	'".$ico."',
	".$ifadm.",
	".$ifnoadm.",
	".$ifnlogin.",
	".$iflogin.",
	".$minada.",
	".$subm.",
	".$vali_s."
	)")){




		header('Location: admin_mods.php');
	}else{
		die('ERRMAGRTBRHR%Y$T%HTIEB(FD');
	}
}
##
##
if(isset($_POST['add_user'])){
	if(isset($_SESSION['BMRG_USR_DB_ID'])){
		$getdatus = getdatafromsql($conn,"select * from b_sm_logins where lum_id = ".$_SESSION['BMRG_USR_DB_ID']." and lum_valid = 1 and lum_ad = 1 and lum_ad_level >= 8");
		if(is_string($getdatus)){
			die('Access Denied');
		}
	}else{
		die('Login to do this action');
	}
	############################33333333
	if(isset($_POST['usr_f_name'])){
		$nm = $_POST['usr_f_name'];
	}else{
		die('Enter all Fields Correctly');
	}
	############################33333333
	if(isset($_POST['usr_email'])){
		if(is_numeric($_POST['usr_email'])){
		$eml = $_POST['usr_email'];
		}else{
			die('AdmNo not Valid');
		}
	}else{
		die('Enter all Fields Correctly');
	}
	############################33333333
	if(isset($_POST['usr_pw'])){
		$pw = md5(md5(sha1($_POST['usr_pw'])));
	}else{
		die('Enter all Fields Correctly');
	}
	############################33333333
	if(isset($_POST['usr_acc']) and is_numeric($_POST['usr_acc'])){
		if(in_range($_POST['usr_acc'],0,1,true)){
		}else{
			die('Values other than 1 or 0 are not allowed 2');
		}
		$ad = $_POST['usr_acc'];
	}else{
		die('Enter all Fields Correctly 3');
	}
	############################33333333
	if(isset($_POST['usr_acc_l']) and is_numeric($_POST['usr_acc_l'])){
		if(in_range($_POST['usr_acc_l'],0,10,true)){
		}else{
			die('Values other than 1 or 0 are not allowed 4');
		}
		$adlvl = $_POST['usr_acc_l'];
	}else{
		die('Enter all Fields Correctly 2');
	}

$hash = gen_hash($pw,$eml);

$checkusrnm = getdatafromsql($conn,"select * from b_sm_logins where lum_username = '".trim($eml)."'");
if(is_array($checkusrnm)){
	die("An acoount with the same admission number already exists.");
}

#########################
	if($conn->query("INSERT INTO `b_sm_logins`(`lum_username`, `lum_password`, `lum_hash`, `lum_ad`, `lum_ad_level`) VALUES 
	('".trim($eml)."', '".trim($pw)."', '".trim($hash)."', '".trim($ad)."', '".trim($adlvl)."')")){





	##
		$ltid = $conn->insert_id;
		
						##### Insert Logs ##################################################################VV3###
		if(preplogs($getdatus,$_SESSION['BMRG_USR_DB_ID'],'b_sm_logins','insert', "INSERT INTO `b_sm_logins`(`lum_username`, `lum_password`, `lum_hash`, `lum_ad`, `lum_ad_level`) VALUES 
	('".trim($eml)."', '".trim($pw)."', '".trim($hash)."', '".trim($ad)."', '".trim($adlvl)."')" ,$conn,$_SESSION['SESS_USR_LOG_MS_VIEW_MD5_ID'])){
		}else{
			die('ERRINCMA%TGTBTR$WESDF');
		}
##### Insert Logs ##################################################################VV3###



	$sqlb = "INSERT INTO `sm_logins_rel`(`l_usr_name`, `l_rel_lum_id`, `l_usr_adm_no`) VALUES (
'".$nm."',
'".$ltid."',
'".$eml."')";

	if ($conn->query($sqlb) === TRUE) {
				##### Insert Logs ##################################################################VV3###
		if(preplogs($getdatus,$_SESSION['BMRG_USR_DB_ID'],'sm_logins_rel','insert', $sqlb ,$conn,$_SESSION['SESS_USR_LOG_MS_VIEW_MD5_ID'])){
		}else{
			die('ERRINCMA%TGTBTR$WESDF');
		}
##### Insert Logs ##################################################################VV3###




	
    header('Location: admin_user.php');
} else {
    echo "Error##rujioma";
}
	

	##
	
	}else{
		die('ERRMAIGOTURG');
	}
}
##
##
#
#
#_______________________________START ADMINMUN_______________________
if(isset($_POST['ha_com']) and isset($_POST['com_make_ac'])){
	if(ctype_alnum(trim($_POST['ha_com']))){
		$checkit = getdatafromsql($conn,"select * from sm_stocks where md5(md5(sha1(sha1(md5(md5(concat(stck_id,'jijnfiirjfnirokijfkorkvnkorvfk'))))))) = '".$_POST['ha_com']."' and stck_valid =0");
		
		if(is_array($checkit)){
			if($conn->query("update sm_stocks set stck_valid =1 where stck_id= ".$checkit['stck_id']."")){
								##### Insert Logs ##################################################################VV3###
		if(preplogs($checkit,$_SESSION['BMRG_USR_DB_ID'],'sm_stocks','update', "update sm_stocks set stck_valid=1 where stck_id= ".$checkit['stck_id']."" ,$conn,$_SESSION['SESS_USR_LOG_MS_VIEW_MD5_ID'])){
		}else{
			die('ERRINCMA%TGTBTR$WESDF');
		}
##### Insert Logs ##################################################################VV3###

								header('Location: admin_comp.php');
			}else{
				die('ERRRMA!JOINJFO');
			}
		}else{
			die("No Mun\'s Found");
		}
	}else{
		die('Invalid Entries');
	}
}
#
#
if(isset($_POST['ha_com']) and isset($_POST['com_make_inac'])){
	if(ctype_alnum(trim($_POST['ha_com']))){
		$checkit = getdatafromsql($conn,"select * from sm_stocks where md5(md5(sha1(sha1(md5(md5(concat(stck_id,'egkjtnr newsdnjjenfkv ijfkorkvnkorvfk'))))))) = '".$_POST['ha_com']."' and stck_valid = 1");
		
		if(is_array($checkit)){
			if($conn->query("update sm_stocks set stck_valid =0 where stck_id= ".$checkit['stck_id']."")){
				##### Insert Logs ##################################################################VV3###
		if(preplogs($checkit,$_SESSION['BMRG_USR_DB_ID'],'sm_stocks','update', "update sm_stocks set stck_valid =0 where stck_id= ".$checkit['stck_id']."" ,$conn,$_SESSION['SESS_USR_LOG_MS_VIEW_MD5_ID'])){
		}else{
			die('ERRINCMA%TGTBTR$WESDF');
		}
##### Insert Logs ##################################################################VV3###

								header('Location: admin_comp.php');
			}else{
				die('ERRRMA!JOINJFWFEAO');
			}
		}else{
			die("No Mun\'s Found");
		}
	}else{
		die('Invalid Entries');
	}
}
#
#_______________________________END ADMINMUN_______________________
#_______________________________START MODULES_______________________
if(isset($_POST['hash_ac']) and isset($_POST['tab_act'])){
	if(ctype_alnum(trim($_POST['hash_ac']))){
		$checkit = getdatafromsql($conn,"select * from e_sv_modules where md5(md5(sha1(sha1(md5(md5(concat(mo_id,'njhifverkof2njbivjwj bfurhib2jw'))))))) = '".$_POST['hash_ac']."' and mo_valid =0");
		
		if(is_array($checkit)){
			if($conn->query("update e_sv_modules  set mo_valid =1 where mo_id= ".$checkit['mo_id']."")){
				##### Insert Logs ##################################################################VV3###
		if(preplogs($checkit,$_SESSION['BMRG_USR_DB_ID'],'e_sv_modules ','update', "update e_sv_modules  set mo_valid =1 where mo_id= ".$checkit['mo_id']."" ,$conn,$_SESSION['SESS_USR_LOG_MS_VIEW_MD5_ID'])){
		}else{
			die('ERRINCMA%TGTBTR$WESDF');
		}
##### Insert Logs ##################################################################VV3###

								header('Location: admin_mods.php');
			}else{
				die('ERRRMA!JOIrfedNJFO');
			}
		}else{
			die("No Modules\'s Found");
		}
	}else{
		die('Invalid Entries');
	}
}
#
#
if(isset($_POST['hash_inc']) and isset($_POST['tab_inact'])){
	if(ctype_alnum(trim($_POST['hash_inc']))){
		$checkit = getdatafromsql($conn,"select * from e_sv_modules  where md5(md5(sha1(sha1(md5(md5(concat(mo_id,'hbujeio03ir94urghnjefr 309i4wef'))))))) = '".$_POST['hash_inc']."' and mo_valid =1");
		
		if(is_array($checkit)){
			if($conn->query("update e_sv_modules  set mo_valid =0 where mo_id= ".$checkit['mo_id']."")){				
##### Insert Logs ##################################################################VV3###
		if(preplogs($checkit,$_SESSION['BMRG_USR_DB_ID'],'e_sv_modules ','update', "update e_sv_modules  set mo_valid =0 where mo_id= ".$checkit['mo_id']."" ,$conn,$_SESSION['SESS_USR_LOG_MS_VIEW_MD5_ID'])){
		}else{
			die('ERRINCMA%TGTBTR$WESDF');
		}
##### Insert Logs ##################################################################VV3###


								header('Location: admin_mods.php');
			}else{
				die('ERRRMAjn4rifJOINJFWFEAO');
			}
		}else{
			die("No Modules\'s Found");
		}
	}else{
		die('Invalid Entries');
	}
}
#
#_______________________________END MODULES_______________________
#
#
#
if(isset($_POST['edit_mod'])){
	if(isset($_SESSION['BMRG_USR_DB_ID'])){
		$getdatus = getdatafromsql($conn,"select * from b_sm_logins where lum_id = ".$_SESSION['BMRG_USR_DB_ID']." and lum_valid = 1 and lum_ad = 1");
		if(is_string($getdatus)){
			die('Access Denied');
		}
	}else{
		die('Login to do this action');
	}
	if(isset($_POST['hash_emmp__1i'])){
		if(ctype_alnum(trim($_POST['hash_emmp__1i']))){
			$editmun = getdatafromsql($conn,"select * from e_sv_modules where md5(md5(sha1(sha1(md5(md5(concat(mo_id,'lkoegnuifvh bnn njenjn'))))))) = '".$_POST['hash_emmp__1i']."'");
			#f0b9915082de5819bf562d53aa59b2d2
			
			if(is_string($editmun)){
				die('Hash Not Found');
			}
		}else{
			die('Invalid hash');
		}
	}else{
		die('Hash Not Valid');
	}
	############################33333333
	if(isset($_POST['edit_mod_lngnme'])){
		$nm = $_POST['edit_mod_lngnme'];
	}else{
		die('Enter all Fields Correctly');
	}
	############################33333333
	if(isset($_POST['edit_mod_shrtnme'])){
		$href = $_POST['edit_mod_shrtnme'];
	}else{
		die('Enter all Fields Correctly');
	}
	############################33333333
	if(isset($_POST['edit_mod_icon'])){
		$ico = $_POST['edit_mod_icon'];
	}else{
		die('Enter all Fields Correctly');
	}
	############################33333333
	if(isset($_POST['edit_mod_sub']) and is_numeric($_POST['edit_mod_sub'])){
		if(in_range($_POST['edit_mod_sub'],0,1,true)){
		}else{
			die('Values other than 1 or 0 are not allowed 1');
		}
		$subm = $_POST['edit_mod_sub'];
	}else{
		die('Enter all Fields Correctly');
	}
	############################33333333
	if(isset($_POST['edit_ifadmin']) and is_numeric($_POST['edit_ifadmin'])){
		if(in_range($_POST['edit_ifadmin'],0,1,true)){
		}else{
			die('Values other than 1 or 0 are not allowed 2');
		}
		$ifadm = $_POST['edit_ifadmin'];
	}else{
		die('Enter all Fields Correctly');
	}
	############################33333333
	if(isset($_POST['edit_ifnoadmin']) and is_numeric($_POST['edit_ifnoadmin'])){
		if(in_range($_POST['edit_ifnoadmin'],0,1,true)){
		}else{
			die('Values other than 1 or 0 are not allowed 3');
		}
		$ifnoadm = $_POST['edit_ifnoadmin'];
	}else{
		die('Enter all Fields Correctly');
	}
	############################33333333
	if(isset($_POST['edit_ifnologin']) and is_numeric($_POST['edit_ifnologin'])){
		if(in_range($_POST['edit_ifnologin'],0,1,true)){
		}else{
			die('Values other than 1 or 0 are not allowed 4');
		}
		$ifnlogin = $_POST['edit_ifnologin'];
	}else{
		die('Enter all Fields Correctly');
	}
	############################33333333
	if(isset($_POST['edit_iflogin']) and is_numeric($_POST['edit_iflogin'])){
		if(in_range($_POST['edit_iflogin'],0,1,true)){
		}else{
			die('Values other than 1 or 0 are not allowed 5');
		}
		$iflogin = $_POST['edit_iflogin'];
	}else{
		die('Enter all Fields Correctly');
	}
	############################33333333
	if(isset($_POST['edit_mominadlvl']) and is_numeric($_POST['edit_mominadlvl'])){
		if(in_range($_POST['edit_mominadlvl'],0,10,true)){
		}else{
			die('Values other than 1 or 0 are not allowed 6');
		}
		$minadlvl = $_POST['edit_mominadlvl'];
	}else{
		die('Enter all Fields Correctly');
	}
	############################33333333

	
	if(1==0){
		#You have not been authorised by SBSEVOTE but by trustee so the user has to grant your changes #
		die("You have not been authorised by SuperUser ");
	}else{
		if($conn->query("UPDATE `e_sv_modules` SET 
`mo_name`= '".$nm."',
`mo_href`='".$href."',
`mo_icon`='".$ico."',
`mo_ifadmin`='".$ifadm."',
`mo_ifnoadmin`='".$ifnoadm."',
`mo_if_no_log_in`='".$ifnlogin."',
`mo_if_log_in`='".$iflogin."',
`mo_sub_mod`='".$subm."',
`mo_min_ad_level` = '".$minadlvl."'
where mo_id = ".trim($editmun['mo_id'])."")){
	
	



	header('Location: admin_mods.php');
		}else{
			die('ERRMAerskirore9njr3ei9jinj');
		}
	}

}
##
##
if(isset($_POST['edit_user'])){
		if(isset($_SESSION['BMRG_USR_DB_ID'])){
		$getdatus = getdatafromsql($conn,"select * from b_sm_logins where lum_id = ".$_SESSION['BMRG_USR_DB_ID']." and lum_valid = 1 and lum_ad = 1 and lum_ad_level >= 9");
		if(is_string($getdatus)){
			die('Access Denied');
		}
	}else{
		die('Login to do this action');
	}
	if(isset($_POST['hash_chkr'])){
		if(ctype_alnum(trim($_POST['hash_chkr']))){
			$editmun = getdatafromsql($conn,"select * from b_sm_logins where md5(md5(sha1(sha1(md5(md5(concat(lum_id,'f2frbgbe 2fgtegrfr3gbter 24rfgr324frgtr3f 3gr32fgr32f4gr'))))))) = '".$_POST['hash_chkr']."'");
			#f0b9915082de5819bf562d53aa59b2d2
			
			if(is_string($editmun)){
				die('Hash Not Found');
			}
		}else{
			die('Invalid hash');
		}
	}else{
		die('Hash Not Valid');
	}
	
	if(isset($_POST['edit_us_nme'])){
		$nm = trim($_POST['edit_us_nme']);
	}else{
		die('Enter all Values 2');
	}
	
	if(isset($_POST['edit_us_adm']) and is_numeric($_POST['edit_us_adm'])){
		if(in_range($_POST['edit_us_adm'],0,1,true)){
		}else{
			die('Values other than 1 or 0 are not allowed 1');
		}
		$admer = $_POST['edit_us_adm'];
	}else{
		die('Enter all Fields Correctly');
	}
	
	if(isset($_POST['edit_us_amdlvl']) and is_numeric($_POST['edit_us_amdlvl'])){
		if(in_range($_POST['edit_us_amdlvl'],0,10,true)){
		}else{
			die('Values other than 1 or 0 are not allowed 1');
		}
		$admlvl = $_POST['edit_us_amdlvl'];
	}else{
		die('Enter all Fields Correctly');
	}
	

	
		
	if(1==0){
		#You have not been authorised by MUNCIURCUIT but by trustee so the user has to grant your changes #
		die("You have not been authorised by SIMSBSSTMK but by trustee so the user has to grant your changes ");
	}else{
		$querytobeinserted = "
UPDATE 
	`b_sm_logins` a
SET 
	a.lum_ad='".$admer."',
	a.lum_ad_level='".$admlvl."',
	a.lum_name='".$nm."'
WHERE
	a.lum_id = ".trim($editmun['lum_id'])."";
		if($conn->query($querytobeinserted)){
		
##### Insert Logs ##################################################################VV3###
		if(preplogs($getdatus,$_SESSION['BMRG_USR_DB_ID'],'b_sm_logins','update',$querytobeinserted,$conn,$_SESSION['SESS_USR_LOG_MS_VIEW_MD5_ID'])){
		}else{
			die('ERRINCMA%TGTBTR$WESDF');
		}
##### Insert Logs ##################################################################VV3###

	header('Location: admin_user.php');
		}else{
			die('EmrfuRRMAers');
		}
	}

}
##
##
if(isset($_POST['c_subject']) and isset($_POST['c_message'])){

if($conn->query("INSERT INTO `d_contact_master`(`c_title`, `c_rel_lum_id`, `c_dnt`) VALUES ('".$_POST['c_subject']."','".$_SESSION['BMRG_USR_DB_ID']."','".time()."')")){
		if($conn->query("INSERT INTO `d_contact_messages`(`m_rel_c_id`, `m_send_rel_lum_id`, `m_text`, `m_dnt`) VALUES ('".$conn->insert_id."', '".$_SESSION['BMRG_USR_DB_ID']."', '".$_POST['c_message']."','".time()."')")){
			header('Location: contact_u.php?sent');
		
		}else{
			die("error inserting into message");
		}


}else{
	die("error inserting into master");
}

}

if(isset($_POST['r_c_id']) and isset($_POST['r_message'])){


$_USER = array();
$_USER = make_user_ar($conn,$_SESSION['BMRG_USR_DB_ID'],1);
	
	
if($_USER['lum_ad'] == 1){
	$c = getdatafromsql($conn, "SELECT * FROM d_contact_master where c_valid =1 and md5((c_id)) = '".$_POST['r_c_id']."' order by c_dnt desc");
}else{
		$c = getdatafromsql($conn, "SELECT * FROM d_contact_master where c_valid =1 and c_status = 0 and c_rel_lum_id = ".$_SESSION['BMRG_USR_DB_ID']." and md5(sha1(c_id)) = '".$_POST['r_c_id']."' order by c_dnt desc");

}

	if(!is_array($c)){
		die("Invalid ID");
	}


		if($conn->query("INSERT INTO `d_contact_messages`(`m_rel_c_id`, `m_send_rel_lum_id`, `m_text`, `m_dnt`) VALUES ('".$c['c_id']."', '".$_SESSION['BMRG_USR_DB_ID']."', '".$_POST['r_message']."','".time()."')")){
			
			if($_USER['lum_ad'] == 1){
			header('Location: contact_a_spl.php?id='.$_POST['r_c_id']);
}else{
			header('Location: contact_so.php?id='.$_POST['r_c_id']);

}

		
		}else{
			die("error inserting into message");
		}


}

if(isset($_POST['res_com']) and ctype_alnum($_POST['res_com'])){
		$c = getdatafromsql($conn, "SELECT * FROM d_contact_master c  where c_valid =1 and c_status=0 and md5(c_id) = '".$_POST['res_com']."' ");
		
		if(!is_array($c)){
			die('Invalid ID');
		}

if($conn->query("update d_contact_master set c_status = 1 where c_id = ".$c['c_id'])){
	header('Location: contact_a_threads.php?id='.md5($c['c_rel_lum_id']));
}else{
	die('ErrorUpdating');
}
}


if(isset($_POST['ris_com']) and ctype_alnum($_POST['ris_com'])){
		$c = getdatafromsql($conn, "SELECT * FROM d_contact_master c  where c_status=1 and c_valid =1 and md5(c_id) = '".$_POST['ris_com']."' ");
		
		if(!is_array($c)){
			die('Invalid ID');
		}

if($conn->query("update d_contact_master set c_status = 0 where c_id = ".$c['c_id'])){
	header('Location: contact_a_threads.php?id='.md5($c['c_rel_lum_id']));
}else{
	die('ErrorUpdating');
}
}

if(isset($_POST['prof_like']) and ctype_alnum($_POST['prof_like'])){
	$_USER = array();
	$_USER = make_user_ar($conn,$_SESSION['BMRG_USR_DB_ID'],1);
		$c = getdatafromsql($conn, "
		SELECT * from b_sm_logins l
left join c_master_gender g on l.lreg_usr_rel_ho_id = g.ho_id
 where lum_valid =1 and lreg_usr_valid =1 and lreg_usr_rel_ho_id not in (".$_USER['lreg_usr_rel_ho_id'].") and lum_ad = 0 
 and lum_id not in (select l_target_rel_lum_id from d_likes where l_rel_lum_id = ".$_SESSION['BMRG_USR_DB_ID']." and l_valid =1)
 and md5(lum_id) = '".$_POST['prof_like']."'
 order by lreg_usr_dnt asc");
		
		if(!is_array($c)){
			die('Invalid ID');
		}

if($conn->query("INSERT INTO `d_likes`(`l_rel_lum_id`, `l_target_rel_lum_id`, `l_dnt`) VALUES ('".$_SESSION['BMRG_USR_DB_ID']."','".$c['lum_id']."','".time()."')")){
echo 1;
}else{
	die('ErrorUpdating');
}
}

if(isset($_POST['prof_dlike']) and ctype_alnum($_POST['prof_dlike'])){
	$_USER = array();
	$_USER = make_user_ar($conn,$_SESSION['BMRG_USR_DB_ID'],1);
		$c = getdatafromsql($conn, "
		SELECT * from b_sm_logins l
left join c_master_gender g on l.lreg_usr_rel_ho_id = g.ho_id
 where lum_valid =1 and lreg_usr_valid =1 and lreg_usr_rel_ho_id not in (".$_USER['lreg_usr_rel_ho_id'].") and lum_ad = 0 
 and lum_id in (select l_target_rel_lum_id from d_likes where l_rel_lum_id = ".$_SESSION['BMRG_USR_DB_ID']." and l_valid =1)
 and md5(lum_id) = '".$_POST['prof_dlike']."'
 order by lreg_usr_dnt asc");
		
		if(!is_array($c)){
			die('Invalid ID');
		}

if($conn->query("update d_likes set l_valid = 0 where l_rel_lum_id = ".$_SESSION['BMRG_USR_DB_ID']." and l_target_rel_lum_id = ".$c['lum_id']." and l_valid =1 ")){
echo 1;
}else{
	die('ErrorUpdating');
}
}

if(isset($_POST['prof_olike']) and ctype_alnum($_POST['prof_olike'])){
	$_USER = array();
	$_USER = make_user_ar($conn,$_SESSION['BMRG_USR_DB_ID'],1);
		$c = getdatafromsql($conn, "
		SELECT * from b_sm_logins l
left join c_master_gender g on l.lreg_usr_rel_ho_id = g.ho_id
 where lum_valid =1 and lreg_usr_valid =1 and lreg_usr_rel_ho_id not in (".$_USER['lreg_usr_rel_ho_id'].") and lum_ad = 0 
 and lum_id in (select l_rel_lum_id from d_likes where l_target_rel_lum_id  = ".$_SESSION['BMRG_USR_DB_ID']." and l_valid =1)
 and md5(lum_id) = '".$_POST['prof_olike']."'
 order by lreg_usr_dnt asc");
		
		if(!is_array($c)){
			die('Invalid ID');
		}

if($conn->query("INSERT INTO `d_likes`(`l_rel_lum_id`, `l_target_rel_lum_id`, `l_dnt`) VALUES ('".$_SESSION['BMRG_USR_DB_ID']."','".$c['lum_id']."','".time()."')")){
echo 1;
}else{
	die('ErrorUpdating');
}
}

if(isset($_POST['prof_cont']) and ctype_alnum($_POST['prof_cont'])){
	$_USER = array();
	$_USER = make_user_ar($conn,$_SESSION['BMRG_USR_DB_ID'],1);
		$c = getdatafromsql($conn, "
		SELECT * from b_sm_logins l
left join c_master_gender g on l.lreg_usr_rel_ho_id = g.ho_id
 where lum_valid =1 and lreg_usr_valid =1 and lreg_usr_rel_ho_id not in (".$_USER['lreg_usr_rel_ho_id'].") and lum_ad = 0 
 and lum_id in (select l_rel_lum_id from d_likes where l_target_rel_lum_id  = ".$_SESSION['BMRG_USR_DB_ID']." and l_valid =1)
 and md5(md5(lum_id)) = '".$_POST['prof_cont']."'
 order by lreg_usr_dnt asc");
		
		if(!is_array($c)){
			die('Invalid ID');
		}

if($conn->query("
INSERT INTO `d_approve_chat`(`ch_lum_id_1`, `ch_lum_id_2`, `ch_approved_lum_id`, `ch_dnt`) VALUES ('".$_SESSION['BMRG_USR_DB_ID']."','".$c['lum_id']."', '0','".time()."')")){
echo 1;
}else{
	die('ErrorUpdating');
}
}

if(isset($_POST['app_id']) and ctype_alnum($_POST['app_id'])){
		$c = getdatafromsql($conn, "
		
		 SELECT c.*, b.lreg_usr_fname as oname , b.lum_id as olum,  l.lreg_usr_fname as tname, l.lum_id as tlum   FROM d_approve_chat c
left join b_sm_logins b on c.ch_lum_id_1 = b.lum_id
left join b_sm_logins l on c.ch_lum_id_2 = l.lum_id

where b.lum_valid = 1 and l.lum_valid =1 and
ch_valid =1 and ch_a = 0 
and md5(md5(ch_id)) =  
'".$_POST['app_id']."' 
order by ch_dnt desc
");
		
		if(!is_array($c)){
			die('Invalid ID');
		}

if($conn->query("update d_approve_chat set ch_a = 1 where ch_id = ".$c['ch_id'])){
	header('Location: admin_chat.php');
}else{
	die('ErrorUpdating');
}
}

if(isset($_POST['ch_text']) and isset($_POST['ch_hash']) and ctype_alnum($_POST['ch_hash'])){
	$checkuser = getdatafromsql($conn, "select * from b_sm_logins where lum_valid =1 and md5(sha1(lum_id)) = '".$_POST['ch_hash']."'");
	if(!is_array($checkuser)){
		die('Invalid User');
	}

	$checkrel = getdatafromsql($conn, "select * from d_approve_chat where ch_valid =1 and ch_lum_id_1 = ".$checkuser['lum_id']." and ch_lum_id_2 = ".$_SESSION['BMRG_USR_DB_ID']." ");
	if(!is_array($checkrel)){
		die('Invalid Relation');
	}
	
	if($conn->query(" INSERT INTO `d_approved_chat_messages`(`cam_hash`, `cam_rel_from_lum_id`, `cam_rel_to_lum_id`, `cam_text`, `cam_dnt`) VALUES 
	('".sort_lums_hash($checkuser['lum_id'],$_SESSION['BMRG_USR_DB_ID'] )."',
	'".$_SESSION['BMRG_USR_DB_ID']."',
	'".$checkuser['lum_id']."',
	'".$_POST['ch_text']."',
	'".time()."')")){
		header('Location: chat_so.php?id='.md5(sha1($checkuser['lum_id'])));
		}else{
			die("insert error");
		}
	
}

?>







