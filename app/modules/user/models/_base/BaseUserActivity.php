<?php

/**
 * This is the model base class for the table "user_activity".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "UserActivity".
 *
 * Columns in table "user_activity" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property string $agent
 * @property string $details
 * @property string $date_recorded
 *
 */
abstract class BaseUserActivity extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'user_activity';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'UserActivity|UserActivities', $n);
	}

	public static function representingColumn() {
		return 'agent';
	}

	public function rules() {
		return array(
			array('agent, details, date_recorded, action_category', 'required'),
			array('agent', 'length', 'max'=>300),
			array('date_recorded', 'length', 'max'=>30),
			array('id, agent, details, date_recorded', 'safe', 'on'=>'search'),
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
			'agent' => Yii::t('app', 'Agent'),
			'details' => Yii::t('app', 'Details'),
			'date_recorded' => Yii::t('app', 'Date Recorded'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('LOWER(agent)', strtolower($this->agent), true);
		$criteria->compare('LOWER(details)', strtolower($this->details), true);
		$criteria->compare('date_recorded', $this->date_recorded, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
			'pagination'=>array('pageSize'=>100),
		));
	}
}