<?php
/**
*  Students
*/
class cms_admin extends cm_dbmanager{

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
$cmsadmin = new cms_admin();
?>