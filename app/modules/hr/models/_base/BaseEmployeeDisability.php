<?php

/**
 * This is the model base class for the table "{{employee_disability}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "EmployeeDisability".
 *
 * Columns in table "{{employee_disability}}" available as properties of the model,
 * followed by relations of table "{{employee_disability}}" available as properties of the model.
 *
 * @property integer $id
 * @property string $pf_number
 * @property string $description
 * @property string $date_modified
 *
 * @property Staff $pfNumber
 */
abstract class BaseEmployeeDisability extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{employee_disability}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'EmployeeDisability|EmployeeDisabilities', $n);
	}

	public static function representingColumn() {
		return 'description';
	}

	public function rules() {
		return array(
			array('pf_number, description', 'required'),
			array('pf_number, date_modified', 'length', 'max'=>30),
			array('description', 'length', 'max'=>200),
			array('date_modified', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, pf_number, description, date_modified', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
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
			'description' => Yii::t('app', 'Description'),
			'date_modified' => Yii::t('app', 'Date Modified'),
			'pfNumber' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('pf_number', $this->pf_number);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('date_modified', $this->date_modified, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}