<?php

/**
 * This is the model class for table "tbl_card".
 *
 * The followings are the available columns in table 'tbl_card':
 * @property integer $id
 * @property string $series
 * @property string $number
 * @property string $create_date
 * @property string $expiration_date
 * @property string $used_date
 * @property integer $total
 * @property integer $status
 */
class Card extends CActiveRecord
{
	public $statusBtnLbl = 'Test';
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_card';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('series, number, create_date, expiration_date', 'required'),
			array('total, status', 'numerical', 'integerOnly'=>true),
			array('series, number', 'length', 'max'=>128),
			// array('create_date, expiration_date', 'date', 'format'=>'yyyy-MM-dd hh:mm'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('series, number, create_date, expiration_date, status', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'order' => array(self::HAS_MANY, 'Order', 'card_id'),
			'lines' => array(self::HAS_MANY, 'OrderLine', array('id'=>'order_id'), 'through'=>'order'),
			'cardSum' => array(self::STAT, 'Order', 'card_id', 'select'=>'SUM(total)')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'series' => 'Series',
			'number' => 'Number',
			'create_date' => 'Create Date',
			'expiration_date' => 'Expiration Date',
			'used_date' => 'Used Date',
			'total' => 'Total',
			'status' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		// $criteria->compare('id',$this->id);
		$criteria->compare('series',$this->series,true);
		$criteria->compare('number',$this->number,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('expiration_date',$this->expiration_date,true);
		// $criteria->compare('used_date',$this->used_date,true);
		// $criteria->compare('total',$this->total);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Card the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getUrl()
	{
		return Yii::app()->createUrl('card/view', array(
			'id'=>$this->id,
			// 'number'=>$this->number,
		));
	}

	/**
	* Change activate / deactivate card status.
	*/
	public function modelActivate()
	{
		if($this->status == 1)
		{
		// $attributes = array();
		// $attributes['status'] = 0;
			$this->status = 0;
			$this->statusBtnLbl = 'Activate Card';
		// return $attributes;
		}
		else
		{
			$this->status = 1;
			$this->statusBtnLbl = 'Deactivate Card';
		}
	}

	protected function afterSave()
	{
		parent::afterSave();
		if($this->status == 1)
		{
			$this->statusBtnLbl = 'Deactivate Card';
		}
		else
		{
			$this->statusBtnLbl = 'Activate Card';
		}
	}

	// public function getStatusBtnLbl()
	// {
	// 	return $this->statusBtnLbl;
	// }
	
	public function getSum()
	{
		$this->total = $this->cardSum();
		$this->save();
	}

	public function getFullNumber()
	{
		return $this->series.' '.$this->number;
	}

	public static function generateCards($count, $series, $expiration_date)
	{
		$card = new Card;
		$card->series = '111';
		$card->number = '222';
		$card->create_date = new CDbExpression('NOW()');
		$card->expiration_date = new CDbExpression('NOW()');
		// var_dump($card);
		// $card->create_date = '2014-11-03 01:05';
		// $card->expiration_date = '2014-11-04 01:16';
		// $card->save();
		return $card;
	}
}
