<?php

/**
 * This is the model base class for the table "{{employee_employment}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "EmployeeEmployment".
 *
 * Columns in table "{{employee_employment}}" available as properties of the model,
 * followed by relations of table "{{employee_employment}}" available as properties of the model.
 *
 * @property integer $id
 * @property string $pf_number
 * @property integer $position_id
 * @property integer $grade_id
 * @property string $d_start
 * @property string $d_end
 * @property string $increment_date
 * @property integer $salary_scale_id
 * @property string $date_modified
 * @property integer $category_id
 *
 * @property Grade $grade
 * @property Position $position
 * @property Employee $pfNumber
 * @property SalaryScale $salaryScale
 */
abstract class BaseEmployeeEmployment extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{employee_employment}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Employment|Employments', $n);
	}

	public static function representingColumn() {
		return 'd_start';
	}

	public function rules() {
		return array(
			array('d_start, employee_ref, type_id, starting_grade_id, pf_number, position_id, grade_id, d_start, increment_date, salary_scale_id, category_id, category, office_id', 'required'),
			array('position_id, consolidated_salary, contract_id, grade_id, office_id, salary_scale_id, category_id, category, employment_id, level_id', 'numerical', 'integerOnly'=>true),
			array('pf_number, d_start, d_end, increment_date, date_modified', 'length', 'max'=>30),
			array('d_end, date_modified', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, pf_number, position_id, grade_id, d_start, d_end, increment_date, salary_scale_id, date_modified, category_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'grade' => array(self::BELONGS_TO, 'Grade', 'grade_id'),
			'position' => array(self::BELONGS_TO, 'PositionName', 'position_id'),
			'pos' => array(self::BELONGS_TO, 'Position', 'position_id'),
			'pfNumber' => array(self::BELONGS_TO, 'Employee', 'pf_number'),
			'employee' => array(self::BELONGS_TO, 'Employee', 'pf_number'),
			'salaryScale' => array(self::BELONGS_TO, 'SalaryScale', 'salary_scale_id'),
			'startingGrade' => array(self::BELONGS_TO, 'Grade', 'starting_grade_id'),
			'categoryN' => array(self::BELONGS_TO, 'EmployeeCategory', 'category_id'),
			'duration' => array(self::BELONGS_TO, 'ContractPeriod', 'contract_id'),
			'type' => array(self::BELONGS_TO, 'EmployeeType', 'type_id'),
			'previous' => array(self::BELONGS_TO, 'EmployeeEmployment', 'employment_id'),
			'office' => array(self::BELONGS_TO, 'Office', 'office_id'),
			
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
			'position_id' => Yii::t('app', 'Position'),
			'employee_ref' => Yii::t('app', 'Employment REF'),
			'starting_grade_id' => Yii::t('app', 'Starting Grade'),
			'type_id' => Yii::t('app', 'Employment Type'),
			'contract_id' => Yii::t('app', 'Employment Duration'),
			'grade_id' => Yii::t('app', 'Grade'),
			'd_start' => Yii::t('app', 'Date of Start'),
			'd_end' => Yii::t('app', 'Date of Termination'),
			'increment_date' => Yii::t('app', 'Increment Date'),
			'salary_scale_id' => Yii::t('app', 'Salary Scale'),
			'date_modified' => Yii::t('app', 'Date Modified'),
			'category_id' => Yii::t('app', 'Category'),
			'level_id' => Yii::t('app', 'Designation Level'),
			'grade' => null,
			'position' => null,
			'pfNumber' => null,
			'salaryScale' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('pf_number', $this->pf_number);
		$criteria->compare('position_id', $this->position_id);
		$criteria->compare('grade_id', $this->grade_id);
		$criteria->compare('d_start', $this->d_start, true);
		$criteria->compare('d_end', $this->d_end, true);
		$criteria->compare('increment_date', $this->increment_date, true);
		$criteria->compare('salary_scale_id', $this->salary_scale_id);
		$criteria->compare('date_modified', $this->date_modified, true);
		$criteria->compare('category_id', $this->category_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}