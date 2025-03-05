<?php

class CourseUnitController extends GxController {

	
	
public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow', 
				'actions'=>array('admin', 'create','update','view','searchByCode'),
				'roles'=>array(12,15),
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}

	public function actionView($id) {
		if (!Yii::app()->getRequest()->getIsAjaxRequest())
			$this->render('view', array(
				'model' => $this->loadModel($id, 'CourseUnit'),
			));
		else
			$this->renderPartial('view', array(
				'model' => $this->loadModel($id, 'CourseUnit'),
			));
	}

	public function actionCreate() {
		$model = new CourseUnit;


		if (isset($_POST['CourseUnit'])) {
			$model->setAttributes($_POST['CourseUnit']);
			
			$course = new CourseUnit;
			$criteria=new CDbCriteria;
			$criteria->select='max(id) AS id';
			$row = $course->model()->find($criteria);
			$id = $row['id'];
			$id++;
			$model->status = 1;
			$model->id = $id;
			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}
		if (!Yii::app()->getRequest()->getIsAjaxRequest())
			$this->render('create', array( 'model' => $model));
		else
			$this->renderPartial('create', array( 'model' => $model));
	}
	
	

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'CourseUnit');


		if (isset($_POST['CourseUnit'])) {
			$model->setAttributes($_POST['CourseUnit']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}
		if (!Yii::app()->getRequest()->getIsAjaxRequest())
			$this->render('update', array(
				'model' => $model,
				));
		else
			$this->renderPartial('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'CourseUnit')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$model = new CourseUnit('search');
		$model->unsetAttributes();

		if (isset($_GET['CourseUnit']))
			$model->setAttributes($_GET['CourseUnit']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionAdmin() {
		$model = new CourseUnit('search');
		$model->unsetAttributes();

		if (isset($_GET['CourseUnit']))
			$model->setAttributes($_GET['CourseUnit']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
	
	
	
	public function actionSearchByCode() {
	  if (isset($_GET['term'])) {
	  
		$criteria=new CDbCriteria;
		
		$criteria->condition = "code like '%" . $_GET['term'] . "%'";
		
		$dataProvider=new CActiveDataProvider('CourseUnit', array('criteria'=>$criteria,'pagination'=>array('pageSize'=>20)));

		$data = $dataProvider->getData();

		$return_array = array();
		foreach($data as $d) {
		  $return_array[] = array(
						'label'=>$d->name.' ('.$d->code.')',
						'value'=>$d->name.' ('.$d->code.')',
						'id'=>$d->code,
						);
		}

		echo CJSON::encode($return_array);
	  }
	}

}
