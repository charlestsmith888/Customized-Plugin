<?php  
/**
*  Students
*/
class cms_teacher extends cm_dbmanager{


public function insert_teacher($form = array()){
	$username 	= $form['student']['username'];
	$email 		= $form['student']['email'];
	$first_name = $form['student']['first_name'];
	$last_name 	= $form['student']['last_name'];
	$password 	= $form['student']['password'];
	$userdata = array(
		'user_login'  =>  $username,
		'user_email' => $email,
		'user_pass'   =>  $password , 
		'first_name' => $first_name,
		'last_name' => $last_name,
		'role' => 'teacher',
	);
	$user_id = username_exists($username);
	if ( !$user_id and email_exists($email) == false) {
		$user_id = wp_insert_user( $userdata );
$message = '
Dear '.$username.',
Your account has been created succesfully. Here are the account login credentials
loign :  	'.$email.'
Password :  '.$password.'
';
wp_mail($email, 'Registration Completed - Account Credentials', $message);		
		return true;
	}else{
		return false;
	}
}

public function insert_course($form = array()){
	$defaults = array(
		'post_author' => $_POST['user_id'],
		'post_content' => $_POST['discription'],
		'post_title' => $_POST['cms_coursename'],
		'post_excerpt' => $_POST['cms_courseprice'],
		'post_status' => 'pending',
		'post_type' => 'courses',
	);
	if (wp_insert_post($defaults)) {
		return true;
	}
}


public function insert_notes($form = array()){
	global $wpdb;
	$defaults = array(
		'post_author' => $form['user_id'],
		'post_title' => $form['cms_coursename'],
		'post_content' => $form['discription'],
		// 'post_excerpt' => $form['cms_courseprice'],
		'post_status' => 'publish',
		'post_type' => 'cms_notes',
	);
	$lastid = wp_insert_post($defaults);
	foreach ($form['users'] as $key => $value) {
		$data = array(
			'user_id' => $value, 
			'meta_key' => 'cms_student_notes', 
			'meta_value' => $lastid, 
			'ex_id' => $form['Course_id'], 
		);
		$wpdb->insert( $wpdb->prefix.'usermeta', $data); 
	}
	return true;
}



public function count_register_students($id = ''){
	global $wpdb;
	$check = $this->getRows($wpdb->prefix.'usermeta' , ['where' =>[
		'meta_key' 		=> 'cms_course_registration',
		'meta_value' 	=> $id,
	]
	]);
	if ($check) {
		return count($check);
	}else{
		return 0;
	}
}


}

$teacher = new cms_teacher();
?>