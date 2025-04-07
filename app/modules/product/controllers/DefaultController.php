<?php

class DefaultController extends Controller
{
    // Display the list of products
    public function actionIndex()
    {
        // Fetch all products from the database
        $products = Products::model()->findAll();

        // Render the view and pass the products to it
        $this->render('index', array(
            'products' => $products,
        ));
    }

    // Create a new product
    public function actionCreate()
    {
        $product = new Products();

        if (isset($_POST['Products'])) {
            $product->attributes = $_POST['Products'];

            // Save the new product
            if ($product->save()) {
                // Redirect to the index page after success
                $this->redirect(array('index'));
            }
        }

        $this->render('create', array('product' => $product));
    }

    // Update an existing product
    public function actionUpdate($id)
    {
        $product = $this->loadModel($id);

        if (isset($_POST['Products'])) {
            $product->attributes = $_POST['Products'];

            // Save the changes
            if ($product->save()) {
                // Redirect to the index page after success
                $this->redirect(array('index'));
            }
        }

        $this->render('update', array('product' => $product));
    }

    // Delete a product
    public function actionDelete($id)
    {
        $product = $this->loadModel($id);

        // Delete the product
        $product->delete();

        // Redirect back to the index page after deletion
        $this->redirect(array('index'));
    }

    // Load a product model based on its ID
    protected function loadModel($id)
    {
        $product = Products::model()->findByPk($id);

        if ($product === null) {
            throw new CHttpException(404, 'The requested product does not exist.');
        }

        return $product;
    }
}
?>
