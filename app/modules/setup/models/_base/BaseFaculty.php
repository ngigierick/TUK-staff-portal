<?php

/**
 * This is the model base class for the table "{{faculty}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Faculty".
 *
 * Columns in table "{{faculty}}" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $notes
 * @property string $date_modified
 *
 */
abstract class BaseFaculty extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{faculty}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Faculty|Faculties', $n);
	}

	public static function representingColumn() {
		return 'name';
	}

	public function rules() {
		return array(
			array('code, name', 'required'),
			array('code', 'length', 'max'=>10),
			array('name', 'length', 'max'=>255),
			array('notes', 'length', 'max'=>500),
			array('date_modified', 'length', 'max'=>30),
			array('notes, date_modified', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, code, name, notes, date_modified', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
		 'school'=>array(self::HAS_MANY, 'School', 'faculty_id'),
		);
	}

	public function pivotModels() {
		return array(
		
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'code' => Yii::t('app', 'Code'),
			'name' => Yii::t('app', 'Name'),
			'notes' => Yii::t('app', 'Notes'),
			'date_modified' => Yii::t('app', 'Date Modified'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('code', $this->code, true);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('notes', $this->notes, true);
		$criteria->compare('date_modified', $this->date_modified, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}