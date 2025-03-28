<?php

/**
 * This is the model base class for the table "{{fee_structure}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "FeeStructure".
 *
 * Columns in table "{{fee_structure}}" available as properties of the model,
 * followed by relations of table "{{fee_structure}}" available as properties of the model.
 *
 * @property integer $id
 * @property string $programme_id
 * @property integer $semester_id
 * @property string $invoice_array
 * @property string $date_modified
 * @property integer $module_id
 *
 * @property Programme $programme
 * @property Semester $semester
 * @property Module $module
 */
abstract class BaseFeeStructure extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{fee_structure}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Fees  Structure|Fees Structure', $n);
	}

	public static function representingColumn() {
		return 'semester';
	}

	public function rules() {
		return array(
			array('programme_id, class_code, semester_id, invoice_array, module_id', 'required'),
			array('semester_id, module_id', 'numerical', 'integerOnly'=>true),
			array('programme_id', 'length', 'max'=>10),
			array('date_modified', 'length', 'max'=>30),
			array('date_modified', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, programme_id, semester_id, invoice_array, date_modified, module_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'programme' => array(self::BELONGS_TO, 'Programme', 'programme_id'),
			'semester' => array(self::BELONGS_TO, 'Semester', 'semester_id'),
			'module' => array(self::BELONGS_TO, 'Module', 'module_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'programme_id' => null,
			'semester_id' => 'Academic year | Semester',
			'invoice_array' => Yii::t('app', 'Amount for Fee Items'),
			'date_modified' => Yii::t('app', 'Date of entry'),
			'module_id' => null,
			'programme' => null,
			'semester' => 'Academic year | Semester',
			'module' => null,
			'class_code'=>'Class code',
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('programme_id', $this->programme_id);
		$criteria->compare('semester_id', $this->semester_id,true);
		$criteria->compare('class_code', $this->class_code, true);
		$criteria->compare('date_modified', $this->date_modified, true);
		$criteria->compare('module_id', $this->module_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
			'pagination'=>array('pageSize'=>100),
		));
	}
}