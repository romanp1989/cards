<?php

/**
 * This is the model class for table "tbl_order".
 *
 * The followings are the available columns in table 'tbl_order':
 * @property integer $id
 * @property string $order_number
 * @property integer $card_id
 * @property double $total
 */
class Order extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_number, card_id', 'required'),
			array('card_id', 'numerical', 'integerOnly'=>true),
			array('total', 'numerical'),
			array('order_number', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('order_number, card_id', 'safe', 'on'=>'search'),
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
			'card' => array(self::BELONGS_TO, 'Card', 'card_id'),
			'lines' => array(self::HAS_MANY, 'OrderLine', 'order_id'),
			'orderSum' => array(self::STAT, 'OrderLine', 'order_id', 'select'=>'SUM(price)')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'order_number' => 'Order Number',
			'card_id' => 'Card',
			'total' => 'Total',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('order_number',$this->order_number,true);
		$criteria->compare('card_id',$this->card_id);
		$criteria->compare('total',$this->total);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Order the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getUrl()
	{
		return Yii::app()->createUrl('order/view',array(
			'id'=>$this->id,
			));
	}

	protected function beforeSave()
	{
		parent::beforeSave();
		if(date_create($this->card->expiration_date) < date_create('now'))
		{
			return false;
		}
		return true;
	}

	protected function afterSave()
	{
		parent::afterSave();
		$this->card->getSum();
		$this->card->used_date = new CDbExpression('NOW()');
		$this->card->save();
	}

	public function getSum()
	{
		$this->total = $this->orderSum;
		$this->save();

	}
}
