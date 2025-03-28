<?php

/**
 * This is the model base class for the table "{{student_mail}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "StudentMail".
 *
 * Columns in table "{{student_mail}}" available as properties of the model,
 * followed by relations of table "{{student_mail}}" available as properties of the model.
 *
 * @property integer $id
 * @property string $student_id
 * @property integer $support_id
 * @property string $subject
 * @property string $body
 * @property integer $status_id
 * @property string $date_modified
 * @property string $reply_date
 * @property string $date_created
 * @property integer $parent_id
 *
 * @property Student $student
 * @property User $support
 */
abstract class BaseStudentMail extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{student_mail}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'StudentMail|StudentMails', $n);
	}

	public static function representingColumn() {
		return 'subject';
	}

	public function rules() {
		return array(
			array('student_id, support_id, subject, body, status_id, date_modified', 'required'),
			array('support_id, status_id, parent_id', 'numerical', 'integerOnly'=>true),
			array('student_id, date_modified, reply_date, date_created', 'length', 'max'=>30),
			array('subject', 'length', 'max'=>1000),
			array('reply_date, date_created, parent_id', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, student_id, support_id, subject, body, status_id, date_modified, reply_date, date_created, parent_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'student' => array(self::BELONGS_TO, 'Student', 'student_id'),
			'support' => array(self::BELONGS_TO, 'User', 'support_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'student_id' => null,
			'support_id' => null,
			'subject' => Yii::t('app', 'Subject'),
			'body' => Yii::t('app', 'Body'),
			'status_id' => Yii::t('app', 'Status'),
			'date_modified' => Yii::t('app', 'Date Modified'),
			'reply_date' => Yii::t('app', 'Reply Date'),
			'date_created' => Yii::t('app', 'Date Created'),
			'parent_id' => Yii::t('app', 'Parent'),
			'student' => null,
			'support' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('student_id', $this->student_id);
		$criteria->compare('support_id', $this->support_id);
		$criteria->compare('subject', $this->subject, true);
		$criteria->compare('body', $this->body, true);
		$criteria->compare('status_id', $this->status_id);
		$criteria->compare('date_modified', $this->date_modified, true);
		$criteria->compare('reply_date', $this->reply_date, true);
		$criteria->compare('date_created', $this->date_created, true);
		$criteria->compare('parent_id', $this->parent_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}