<?php

/**
 * This is the model base class for the table "{{feecategory}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "FeeCategory".
 *
 * Columns in table "{{feecategory}}" available as properties of the model,
 * followed by relations of table "{{feecategory}}" available as properties of the model.
 *
 * @property integer $id
 * @property string $name
 *
 * @property Feepayable[] $feepayables
 */
abstract class BaseFeeCategory extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{feecategory}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'FeeCategory|FeeCategories', $n);
	}

	public static function representingColumn() {
		return 'name';
	}

	public function rules() {
		return array(
			array('name', 'length', 'max'=>30),
			array('name', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, name', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'feepayables' => array(self::HAS_MANY, 'Feepayable', 'paid'),
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
			'feepayables' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('name', $this->name, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}