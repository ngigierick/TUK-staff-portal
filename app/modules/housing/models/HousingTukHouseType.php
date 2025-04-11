<?php
/**
 * This is the model class for table "{{housing_tuk_house_type}}".
 *
 * The followings are the available columns in table '{{housing_tuk_house_type}}':
 * @property integer $id
 * @property integer $bedrooms
 * @property string $size
 *
 * The followings are the available model relations:
 * @property Housing[] $housings
 */
class HousingTukHouseType extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return HousingTukHouseType the static model class
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
        return '{{housing_tuk_house_type}}';  // Table name for HousingTukHouseType
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('bedrooms, size', 'required'),   // Bedrooms and size are required
            array('bedrooms', 'numerical', 'integerOnly'=>true),  // Bedrooms should be an integer
            array('size', 'length', 'max'=>50),    // Size should be a maximum of 50 characters
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, bedrooms, size', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'housings' => array(self::HAS_MANY, 'Housing', 'type_id'),  // Relation to Housing model
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'bedrooms' => 'Bedrooms',
            'size' => 'Size',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        $criteria = new CDbCriteria;

        // Add search criteria for each attribute
        $criteria->compare('id', $this->id);
        $criteria->compare('bedrooms', $this->bedrooms);
        $criteria->compare('size', $this->size, true);

        // Return data provider for search
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
}
