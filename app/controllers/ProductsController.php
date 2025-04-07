<?php

namespace app\controllers;  // Define the namespace for the controller

use Yii;
use app\models\Products;  // Import the Products model
use yii\web\Controller;  // Import the base controller class from Yii
use yii\web\NotFoundHttpException;  // For handling not found exceptions
use yii\data\ActiveDataProvider;  // To paginate data results

/**
 * ProductsController handles product-related actions.
 */
class ProductsController extends Controller
{
    /**
     * Displays a list of all products.
     * 
     * @return mixed
     */
	public function actionIndex($category = null)
	{
		$query = Products::find();
	
		// Apply category filter if selected
		if ($category) {
			$query->where(['category' => $category]);
		}
	
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
			'pagination' => [
				'pageSize' => 10,
			],
		]);
	
		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'selectedCategory' => $category, // Pass selected category to view
		]);
	}
	

    /**
     * Displays a single product.
     * 
     * @param integer $id the ID of the product to be displayed
     * @return mixed
     * @throws NotFoundHttpException if the product cannot be found
     */
    public function actionView($id)
    {
        $product = Products::findOne($id);  // Find a product by its ID

        // If product is not found, throw an exception
        if ($product === null) {
            throw new NotFoundHttpException('The requested product does not exist.');
        }

        // Render the 'view' page for the single product
        return $this->render('view', [
            'product' => $product,
        ]);
    }

    /**
     * Creates a new product.
     * 
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Products();  // Create a new Products model

        // If form is submitted and data is valid
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // Redirect to the 'view' page of the newly created product
            return $this->redirect(['view', 'id' => $model->id]);
        }

        // Render the 'create' view with the product model
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing product.
     * 
     * @param integer $id the ID of the product to be updated
     * @return mixed
     * @throws NotFoundHttpException if the product cannot be found
     */
    public function actionUpdate($id)
    {
        $model = Products::findOne($id);  // Find the product by ID

        // If product is not found, throw an exception
        if ($model === null) {
            throw new NotFoundHttpException('The requested product does not exist.');
        }

        // If form is submitted and data is valid
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // Redirect to the 'view' page of the updated product
            return $this->redirect(['view', 'id' => $model->id]);
        }

        // Render the 'update' view with the product model
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing product.
     * 
     * @param integer $id the ID of the product to be deleted
     * @return mixed
     * @throws NotFoundHttpException if the product cannot be found
     */
    public function actionDelete($id)
    {
        $model = Products::findOne($id);  // Find the product by ID

        // If product is not found, throw an exception
        if ($model === null) {
            throw new NotFoundHttpException('The requested product does not exist.');
        }

        // Delete the product
        $model->delete();

        // Redirect back to the 'index' page after deletion
        return $this->redirect(['index']);
    }
}
