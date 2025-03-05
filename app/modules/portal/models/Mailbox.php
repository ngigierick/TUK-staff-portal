<?php

/**
 * This is the model class for table "{{mailbox}}".
 *
 * The followings are the available columns in table '{{mailbox}}':
 * @property integer $id
 * @property integer $category_id
 * @property integer $from_id
 * @property integer $to_id
 * @property string $subject
 * @property string $body
 * @property integer $status_id
 * @property string $date_modified
 */
class Mailbox extends GxActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Mailbox the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{mailbox_s}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_id, from_id, to_id, subject, body, status_id, date_created, date_modified', 'required'),
			array('category_id, from_id, to_id, status_id', 'numerical', 'integerOnly'=>true),
			array('date_modified', 'length', 'max'=>30),
			array('subject', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, category_id, from_id, to_id, subject, body, status_id, date_modified', 'safe', 'on'=>'search'),
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
			'sender' => array(self::BELONGS_TO, 'User', 'from_id'),
			'receiver' => array(self::BELONGS_TO, 'User', 'to_id'),
		
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'category_id' => 'Category',
			'sender'=>'Sender',
			'receiver'=>'Receiver',
			'from_id' => 'Sender',
			'to_id' => 'Recipient',
			'subject' => 'Subject',
			'body' => 'Message',
			'status_id' => 'Status',
			'date_created' => 'Date Sent',
			'parent_id' => 'Message Parent',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('from_id',$this->from_id);
		$criteria->compare('to_id',$this->to_id);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('body',$this->body,true);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('date_modified',$this->date_modified,true);
		$criteria->order = 'id DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function afterFind()
	{
		$this->status_id = ($this->status_id=='0')?'<span class="unread">Unread</span>':'<span class="read">Read</span>';
	}
}