<?php

/**
 * This is the model class for table "products".
 *
 * The followings are the available columns in table 'products':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $price
 * @property string $category
 * @property string $image
 */
class Products extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Products the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'products';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('name, description, price, category', 'required'),
			array('name', 'length', 'max'=>255),
			array('price', 'length', 'max'=>10),
			array('category', 'length', 'max'=>50),

			// File validation: allow common image formats; image is optional
			array('image', 'file', 'types'=>'jpg, jpeg, png, gif', 'allowEmpty'=>true, 'safe'=>false),

			// For search
			array('id, name, description, price, category, image', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'description' => 'Description',
			'price' => 'Price',
			'category' => 'Category',
			'image' => 'Image',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('price', $this->price, true);
		$criteria->compare('category', $this->category, true);
		$criteria->compare('image', $this->image, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}
