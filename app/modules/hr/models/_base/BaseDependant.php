<?php

/**
 * This is the model base class for the table "{{dependant}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Dependant".
 *
 * Columns in table "{{dependant}}" available as properties of the model,
 * followed by relations of table "{{dependant}}" available as properties of the model.
 *
 * @property integer $id
 * @property integer $staff_id
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
 * @property Staff $staff
 * @property Relationship $relationship
 */
abstract class BaseDependant extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{dependant}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Dependant|Dependants', $n);
	}

	public static function representingColumn() {
		return array('firstname','surname','othername');
	}

	public function rules() {
		return array(
			array('staff_id, surname, firstname, relationship_id, gender_id, dob, status', 'required'),
			array('staff_id, relationship_id, gender_id, status', 'numerical', 'integerOnly'=>true),
			array('surname, firstname, othername, dob, date_modified', 'length', 'max'=>30),
			array('photo', 'length', 'max'=>100),
			array('othername, date_modified, photo', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, staff_id, surname, firstname, othername, relationship_id, gender_id, dob, status, date_modified, photo', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'gender' => array(self::BELONGS_TO, 'Gender', 'gender_id'),
			'staff' => array(self::BELONGS_TO, 'Staff', 'staff_id'),
			'relationship' => array(self::BELONGS_TO, 'Relationship', 'relationship_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'staff_id' => null,
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
			'staff' => null,
			'relationship' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('staff_id', $this->staff_id);
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