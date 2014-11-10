<?php
class CheckCardCommand extends CConsoleCommand {
	public function run($args) {
		// Card::findAll('status=2','expiration_date < NOW()');
		Yii::app()->db->createCommand()->update('tbl_card',array('status'=>2,),'expiration_date < NOW()');
		// echo 'Test';
	}
}
?>