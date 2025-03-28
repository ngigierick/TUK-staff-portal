<?php

/**
 * This is the model base class for the table "{{documentation}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Documentation".
 *
 * Columns in table "{{documentation}}" available as properties of the model,
 * followed by relations of table "{{documentation}}" available as properties of the model.
 *
 * @property integer $id
 * @property string $content
 * @property integer $author_id
 * @property integer $category_id
 * @property string $date_added
 * @property string $date_modified
 * @property integer $status_id
 * @property string $title
 *
 * @property User $author
 * @property DocumentationCategory $category
 * @property Status $status
 */
abstract class BaseDocumentation extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{documentation}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Documentation|Documentations', $n);
	}

	public static function representingColumn() {
		return 'title';
	}

	public function rules() {
		return array(
			array('content, author_id, category_id', 'required'),
			array('author_id, category_id, status_id', 'numerical', 'integerOnly'=>true),
			array('date_added, date_modified', 'length', 'max'=>30),
			array('title', 'length', 'max'=>100),
			array('date_added, date_modified, status_id, title', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, content, author_id, category_id, date_added, date_modified, status_id, title', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'author' => array(self::BELONGS_TO, 'User', 'author_id'),
			'category' => array(self::BELONGS_TO, 'DocumentationCategory', 'category_id'),
			'status' => array(self::BELONGS_TO, 'Status', 'status_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'content' => Yii::t('app', 'Content'),
			'author_id' => 'Author',
			'category_id' => 'Category',
			'date_added' => Yii::t('app', 'Date Added'),
			'date_modified' => Yii::t('app', 'Date Modified'),
			'status_id' => 'Status',
			'title' => Yii::t('app', 'Title'),
			'author' => 'Author',
			'category' => 'Category',
			'status' => 'Status',
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('content', $this->content, true);
		$criteria->compare('author_id', $this->author_id);
		$criteria->compare('category_id', $this->category_id);
		$criteria->compare('date_added', $this->date_added, true);
		$criteria->compare('date_modified', $this->date_modified, true);
		$criteria->compare('status_id', $this->status_id);
		$criteria->compare('title', $this->title, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}