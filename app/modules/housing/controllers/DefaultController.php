<?php
Yii::import('application.modules.hr.models.*');
Yii::import('application.modules.user.models.User');
Yii::import('application.modules.help.models.*');

class DefaultController extends GxController
{
    // This is the default action which renders the index page.
    public function actionIndex()
    {
        // Fetch all housing records from the database
        $housing = Housing::model()->findAll();

        // Pass the data to the view
        $this->render('index', array('housing' => $housing));
    }

    // This action will display a specific housing record based on the ID.
    public function actionView($id)
    {
        // Find the housing record by ID
        $model = $this->loadModel($id, 'Housing');
        
        // Render the view page for this housing record
        $this->render('view', array('model' => $model));
    }

    // This action is for creating a new housing record.
    public function actionCreate()
    {
        $model = new Housing; // Create a new model instance

        // Check if the form is submitted
        if (isset($_POST['Housing'])) {
            $model->attributes = $_POST['Housing']; // Assign attributes from the form

            // Save the model if it passes validation
            if ($model->save()) {
                // Redirect to the index page after successful creation
                $this->redirect(array('index'));
            }
        }

        // Render the 'create' view page, passing the model to it
        $this->render('create', array('model' => $model));
    }

    // This action will update an existing housing record.
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id, 'Housing'); // Load the existing record by ID

        if (isset($_POST['Housing'])) {
            $model->attributes = $_POST['Housing']; // Assign new values to model
            
            if ($model->save()) {
                // Redirect to the view page after successful update
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        // Render the update view
        $this->render('update', array('model' => $model));
    }

    // This action will delete an existing housing record.
    public function actionDelete($id)
    {
        // Find the housing record by ID and delete it
        $model = $this->loadModel($id);
        $model->delete();

        // Redirect back to the index page after deletion
        $this->redirect(array('index'));
    }

    /*
    // This function loads a model by its ID (used for viewing, updating, and deleting).
    protected function loadModel($id)
    {
        // Find the housing model by ID
        $model = Housing::model()->findByPk($id);

        // If the model is not found, throw an error
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }

        // Return the model instance
        return $model;
    }
    */
}
