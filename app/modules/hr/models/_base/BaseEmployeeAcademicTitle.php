<?php

/**
 * This is the model base class for the table "{{employee_academic_title}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "EmployeeAcademicTitle".
 *
 * Columns in table "{{employee_academic_title}}" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property string $name
 * @property string $date_modified
 *
 */
abstract class BaseEmployeeAcademicTitle extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{employee_academic_title}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'EmployeeAcademicTitle|EmployeeAcademicTitles', $n);
	}

	public static function representingColumn() {
		return 'name';
	}

	public function rules() {
		return array(
			array('date_modified', 'required'),
			array('name', 'length', 'max'=>50),
			array('date_modified', 'length', 'max'=>30),
			array('name', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, name, date_modified', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'name' => Yii::t('app', 'Name'),
			'date_modified' => Yii::t('app', 'Date Modified'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('date_modified', $this->date_modified, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}