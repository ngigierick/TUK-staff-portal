<?php

Yii::import('application.modules.hr.models.*');
Yii::import('application.modules.user.models.User');
Yii::import('application.modules.help.models.*');

class DefaultController extends GxController
{
    // Display the list of products
    public function actionIndex()
    {
        $products = Products::model()->findAll();

        // Render the list of products
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
            
            // Handle image upload
            $image = CUploadedFile::getInstance($product, 'image');
            if ($image !== null) {
                $imageName = uniqid() . '_' . $image->name;
                $product->image = $imageName;
            }

            // Check if the product model is valid before saving
            if ($product->validate()) {
                // Save the product to the database
                if ($product->save()) {
                    // Save the uploaded image if present
                    if ($image !== null) {
                        $image->saveAs(Yii::getPathOfAlias('webroot') . '/uploads/' . $imageName);
                    }

                    // Return success response for AJAX request
                    if (Yii::app()->request->isAjaxRequest) {
                        echo CJSON::encode(array('status' => 'success', 'div' => $this->renderPartial('_form', array('product' => $product), true)));
                        Yii::app()->end();
                    }

                    // Redirect to the products list after successful creation (non-AJAX request)
                    $this->redirect(array('index'));
                } else {
                    Yii::log('Product not saved: ' . print_r($product->errors, true), 'error');
                }
            } else {
                Yii::log('Validation failed: ' . print_r($product->errors, true), 'error');
            }
        }

        // Render the create form with the product object (for non-AJAX request)
        if (!Yii::app()->request->isAjaxRequest) {
            $this->render('create', array('product' => $product));
        }
    }

    // Update an existing product
    public function actionUpdate($id)
    {
        $product = $this->loadModel($id);

        if (isset($_POST['Products'])) {
            $product->attributes = $_POST['Products'];

            // Handle image upload
            $image = CUploadedFile::getInstance($product, 'image');
            if ($image !== null) {
                $imageName = uniqid() . '_' . $image->name;
                $product->image = $imageName;
            }

            if ($product->save()) {
                // Save new image file if uploaded
                if ($image !== null) {
                    $image->saveAs(Yii::getPathOfAlias('webroot') . '/uploads/' . $imageName);
                }

                // Return success response for AJAX request
                if (Yii::app()->request->isAjaxRequest) {
                    echo CJSON::encode(array('status' => 'success', 'div' => $this->renderPartial('_form', array('product' => $product), true)));
                    Yii::app()->end();
                }

                $this->redirect(array('index'));
            }
        }

        // Render the update form (for non-AJAX request)
        if (!Yii::app()->request->isAjaxRequest) {
            $this->render('update', array('product' => $product));
        }
    }

    // Delete a product
    public function actionDelete($id)
    {
        $product = $this->loadModel($id);

        // Optionally delete the image file here if needed
        if (file_exists(Yii::getPathOfAlias('webroot') . '/uploads/' . $product->image)) {
            unlink(Yii::getPathOfAlias('webroot') . '/uploads/' . $product->image);
        }

        // Delete the product from the database
        $product->delete();

        // Return success response for AJAX request
        if (Yii::app()->request->isAjaxRequest) {
            echo CJSON::encode(array('status' => 'success'));
            Yii::app()->end();
        }

        // Redirect to the products list after successful deletion (non-AJAX request)
        $this->redirect(array('index'));
    }

    // Load a product model based on its ID
    /*public function loadModel($id)
    {
        $product = Products::model()->findByPk($id);

        if ($product === null) {
            throw new CHttpException(404, 'The requested product does not exist.');
        }

        return $product;
    }*/
}
