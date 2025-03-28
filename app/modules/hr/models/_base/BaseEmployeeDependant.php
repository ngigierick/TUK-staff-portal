<?php

/**
 * This is the model base class for the table "{{employee_dependant}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "EmployeeDependant".
 *
 * Columns in table "{{employee_dependant}}" available as properties of the model,
 * followed by relations of table "{{employee_dependant}}" available as properties of the model.
 *
 * @property integer $id
 * @property string $pf_number
 * @property string $surname
 * @property string $firstname
 * @property string $othername
 * @property integer $relationship_id
 * @property integer $gender_id
 * @property string $dob
 * @property integer $status
 * @property string $date_modified
 * @property string $photo
 *
 * @property Gender $gender
 * @property Relationship $relationship
 * @property Staff $pfNumber
 */
abstract class BaseEmployeeDependant extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{employee_dependant}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'EmployeeDependant|EmployeeDependants', $n);
	}

	public static function representingColumn() {
		return array('firstname','othername', 'surname');
	}

	public function rules() {
		return array(
			array('pf_number, surname, firstname, relationship_id, gender_id, dob, status', 'required'),
			array('relationship_id, gender_id, status', 'numerical', 'integerOnly'=>true),
			array('pf_number, surname, firstname, othername, dob, date_modified', 'length', 'max'=>30),
			array('photo', 'length', 'max'=>100),
			array('othername, date_modified, photo', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, pf_number, surname, firstname, othername, relationship_id, gender_id, dob, status, date_modified, photo', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'gender' => array(self::BELONGS_TO, 'Gender', 'gender_id'),
			'relationship' => array(self::BELONGS_TO, 'Relationship', 'relationship_id'),
			'pfNumber' => array(self::BELONGS_TO, 'Employee', 'pf_number'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'pf_number' => null,
			'surname' => Yii::t('app', 'Surname'),
			'firstname' => Yii::t('app', 'Firstname'),
			'othername' => Yii::t('app', 'Othername'),
			'relationship_id' => null,
			'gender_id' => null,
			'dob' => Yii::t('app', 'Dob'),
			'status' => Yii::t('app', 'Status'),
			'date_modified' => Yii::t('app', 'Date Modified'),
			'photo' => Yii::t('app', 'Photo'),
			'gender' => null,
			'relationship' => null,
			'pfNumber' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('pf_number', $this->pf_number);
		$criteria->compare('surname', $this->surname, true);
		$criteria->compare('firstname', $this->firstname, true);
		$criteria->compare('othername', $this->othername, true);
		$criteria->compare('relationship_id', $this->relationship_id);
		$criteria->compare('gender_id', $this->gender_id);
		$criteria->compare('dob', $this->dob, true);
		$criteria->compare('status', $this->status);
		$criteria->compare('date_modified', $this->date_modified, true);
		$criteria->compare('photo', $this->photo, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}