<?php

/**
 * This is the model class for table "{{housing}}".
 *
 * The followings are the available columns in table '{{housing}}':
 * @property integer $id
 * @property string $housename
 * @property string $location
 * @property integer $type_id
 * @property string $rent
 *
 * The followings are the available model relations:
 * @property HousingTukHouseType $type
 */
class Housing extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Housing the static model class
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
        return '{{housing}}'; // This points to your 'housing' table
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('housename, location, type_id, rent', 'required'), // All fields are mandatory
            array('type_id', 'numerical', 'integerOnly' => true), // type_id should be an integer
            array('housename, location', 'length', 'max' => 100), // Max length for housename and location
            array('rent', 'length', 'max' => 10), // Max length for rent field
            array('rent', 'numerical', 'integerOnly' => true), // Ensure rent is a numeric value
            array('id, housename, location, type_id, rent', 'safe', 'on' => 'search'), // For search purposes
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'type' => array(self::BELONGS_TO, 'HousingTukHouseType', 'type_id'), // Relationship with HousingTukHouseType table
        );
    }

    /**
     * @return array customized attribute labels (name => label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'housename' => 'House Name', // Updated label for better clarity
            'location' => 'Location',
            'type_id' => 'House Type', // Updated label for better clarity
            'rent' => 'Rent Amount', // Updated label for better clarity
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        $criteria = new CDbCriteria;

        // Comparing the input values with the database fields
        $criteria->compare('id', $this->id);
        $criteria->compare('housename', $this->housename, true);
        $criteria->compare('location', $this->location, true);
        $criteria->compare('type_id', $this->type_id);
        $criteria->compare('rent', $this->rent, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria, // Returns data based on the criteria
        ));
    }
}
?>
