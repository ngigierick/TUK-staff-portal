<?php

namespace app\models;  // Define the namespace for the model

use Yii;
use yii\db\ActiveRecord;  // Import ActiveRecord class to interact with the database

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $price
 * @property string $discount
 * @property integer $stock
 * @property string $image
 * @property string $category
 */
class Products extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        // Define the table name associated with the Products model
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        // Validation rules for attributes
        return [
            [['name', 'price', 'category', 'image'], 'required'],  // Make sure these fields are not empty
            [['price'], 'number'],  // Ensure that price is a number
            [['category'], 'in', 'range' => ['clothes', 'accessories', 'tech']],  // Category must be one of these values
            [['image'], 'string', 'max' => 255],  // Image path should be a string and not exceed 255 characters
            [['description'], 'safe'],  // Allow description to be safely assigned
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        // Labels for the attributes, used for displaying human-readable field names in forms and views
        return [
            'id' => 'ID',
            'name' => 'Product Name',
            'description' => 'Product Description',
            'price' => 'Price',
            'discount' => 'Discount',
            'stock' => 'Stock',
            'image' => 'Product Image',
            'category' => 'Category',
        ];
    }

    /**
     * Search functionality for the products
     * This function provides a filterable search query for the products.
     * It can be used to filter products by name and category.
     *
     * @return \yii\data\ActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Initialize a query to fetch products
        $query = Products::find();

        // Add conditions for filtering the products
        $query->andFilterWhere(['like', 'name', $this->name])  // Filter by product name
              ->andFilterWhere(['like', 'category', $this->category]);  // Filter by product category

        // Return the filtered results in a paginated data provider
        return new \yii\data\ActiveDataProvider([
            'query' => $query,
        ]);
    }
}
