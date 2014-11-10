<?php
class GenerateForm extends CFormModel
{
	public $id;
	public $count;
	public $series;
	public $period;

	public function rules()
	{
		return array(
			array('count, series, period', 'required'),
			array('count, series', 'numerical', 'integerOnly'=>true),
			array('period', 'date'),
			);

	}

	public function generateCards()
	{
		$series = $this->series;
		$period = $this->period;
		$create_date = new CDbExpression('NOW()');
		$expiration_date = date_create('now');
		$expiration_date->add(new DateInterval('P'.$period.'M'));
		$status = 1;
		$card_array = array();
		for ($i=0; $i < $this->count; $i++)
		{
			$card_number = mt_rand(100000,999999);
			$card_array[] = array('number'=>$card_number, 'series'=>$series, 'expiration_date'=>$expiration_date->format('Y-m-d H:i:s'), 'create_date'=>$create_date, 'status'=>$status);
		}
		$cards = Yii::app()->db->schema->commandBuilder;
		$cards->createMultipleInsertCommand('tbl_card',$card_array)->execute();
		return $card_array;
	}
	
}
?>