<?php

/**
 * This is the model base class for the table "{{project_module_task}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "ProjectModuleTask".
 *
 * Columns in table "{{project_module_task}}" available as properties of the model,
 * followed by relations of table "{{project_module_task}}" available as properties of the model.
 *
 * @property integer $id
 * @property string $name
 * @property string $content
 * @property integer $author_id
 * @property integer $assigned_id
 * @property string $start_date
 * @property string $end_date
 * @property string $completion_stage
 * @property integer $module_id
 * @property string $date_modified
 * @property integer $status_id
 *
 * @property ProjectModule $module
 * @property User $assigned
 * @property User $author
 */
abstract class BaseProjectModuleTask extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{project_module_task}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Project Module Task|Project Module Tasks', $n);
	} 

	public static function representingColumn() {
		return 'name';
	}

	public function rules() {
		return array(
			array('content, author_id, assigned_id, completion_stage, module_id', 'required'),
			array('author_id, assigned_id, module_id, status_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>50),
			array('start_date, end_date, date_modified', 'length', 'max'=>30),
			array('name, start_date, end_date, date_modified, status_id', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, name, content, author_id, assigned_id, start_date, end_date, completion_stage, module_id, date_modified, status_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'module' => array(self::BELONGS_TO, 'ProjectModule', 'module_id'),
			'assigned' => array(self::BELONGS_TO, 'User', 'assigned_id'),
			'author' => array(self::BELONGS_TO, 'User', 'author_id'),
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
			'content' => Yii::t('app', 'Content'),
			'author_id' => null,
			'assigned_id' => null,
			'start_date' => Yii::t('app', 'Start Date'),
			'end_date' => Yii::t('app', 'End Date'),
			'completion_stage' => Yii::t('app', 'Completion Stage (%)'),
			'module_id' => null,
			'date_modified' => Yii::t('app', 'Date Modified'),
			'status_id' => Yii::t('app', 'Status'),
			'module' => null,
			'assigned' => null,
			'author' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('content', $this->content, true);
		$criteria->compare('author_id', $this->author_id);
		$criteria->compare('assigned_id', $this->assigned_id);
		$criteria->compare('start_date', $this->start_date, true);
		$criteria->compare('end_date', $this->end_date, true);
		$criteria->compare('completion_stage', $this->completion_stage, true);
		$criteria->compare('module_id', $this->module_id);
		$criteria->compare('date_modified', $this->date_modified, true);
		$criteria->compare('status_id', $this->status_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}