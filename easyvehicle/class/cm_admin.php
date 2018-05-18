<?php
/**
*  Students
*/
class ev_functions extends ev_dbmanager{

	public function cms_assign_course($form = array()){
		global $wpdb;

		$coursid = $form['Course_id'];
		$teacher_id = $form['teacher_id'];

		$check = $this->getRows($wpdb->prefix.'posts' , ['where' =>[
			'ID' =>  $coursid,
			'post_author' => $teacher_id,
		] ]);

		if (empty($check)) {
			$my_post = array(
				'ID'           => $coursid,
				'post_author' => $teacher_id,
			);
			wp_update_post( $my_post );
			return true;		
		}else{
			return false;
		}


	}
}
$ev_fun = new ev_functions();


function ev_price($dollars = ''){
	return '$'.sprintf('%0.2f', $dollars);
}

?>