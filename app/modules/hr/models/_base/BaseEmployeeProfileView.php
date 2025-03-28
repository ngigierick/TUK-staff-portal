<?php

/**
 * This is the model base class for the table "{{employee_profile_view}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "EmployeeProfileView".
 *
 * Columns in table "{{employee_profile_view}}" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property integer $category
 * @property string $date_viewed
 * @property integer $profile_id
 * @property integer $user_id
 * @property string $date_modified
 *
 */
abstract class BaseEmployeeProfileView extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{employee_profile_view}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'EmployeeProfileView|EmployeeProfileViews', $n);
	}

	public static function representingColumn() {
		return 'date_viewed';
	}

	public function rules() {
		return array(
			array('category, date_viewed, profile_id, user_id', 'required'),
			array('category, profile_id, user_id', 'numerical', 'integerOnly'=>true),
			array('date_viewed, date_modified', 'length', 'max'=>30),
			array('date_modified', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, category, date_viewed, profile_id, user_id, date_modified', 'safe', 'on'=>'search'),
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
			'category' => Yii::t('app', 'Category'),
			'date_viewed' => Yii::t('app', 'Date Viewed'),
			'profile_id' => Yii::t('app', 'Profile'),
			'user_id' => Yii::t('app', 'User'),
			'date_modified' => Yii::t('app', 'Date Modified'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('category', $this->category);
		$criteria->compare('date_viewed', $this->date_viewed, true);
		$criteria->compare('profile_id', $this->profile_id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('date_modified', $this->date_modified, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}