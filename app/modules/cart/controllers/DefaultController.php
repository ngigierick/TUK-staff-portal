<?php
class CartController extends Controller
{
    public function actionIndex()
    {
        $products = Products::model()->findAll(); // Fetch all products
        $this->render('index', ['products' => $products]);
    }
}
