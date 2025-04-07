<?php
class CartController extends Controller
{
    public function actionIndex()
    {
        $products = Products::model()->findAll(); // Fetch all products
        $cartItems = Cart::model()->findAllByAttributes(['user_id' => Yii::app()->user->id]); // Fetch cart items for logged-in user
        
        $this->render('index', [
            'products' => $products,
            'cartItems' => $cartItems,
        ]);
    }

    public function actionAdd($id)
    {
        $product = Products::model()->findByPk($id);
        if ($product) {
            $cartItem = Cart::model()->findByAttributes(['user_id' => Yii::app()->user->id, 'product_id' => $id]);

            if ($cartItem) {
                $cartItem->quantity += 1; // Increase quantity if already in cart
            } else {
                $cartItem = new Cart();
                $cartItem->user_id = Yii::app()->user->id;
                $cartItem->product_id = $id;
                $cartItem->quantity = 1;
            }

            if ($cartItem->save()) {
                Yii::app()->user->setFlash('success', 'Product added to cart.');
            } else {
                Yii::app()->user->setFlash('error', 'Failed to add product.');
            }
        }

        $this->redirect(array('index'));
    }

    public function actionUpdate($id, $quantity)
    {
        $cartItem = Cart::model()->findByPk($id);
        if ($cartItem && $cartItem->user_id == Yii::app()->user->id) {
            $cartItem->quantity = $quantity;
            if ($cartItem->save()) {
                Yii::app()->user->setFlash('success', 'Cart updated.');
            } else {
                Yii::app()->user->setFlash('error', 'Failed to update cart.');
            }
        }

        $this->redirect(array('index'));
    }

    public function actionDelete($id)
    {
        $cartItem = Cart::model()->findByPk($id);
        if ($cartItem && $cartItem->user_id == Yii::app()->user->id) {
            $cartItem->delete();
            Yii::app()->user->setFlash('success', 'Item removed from cart.');
        } else {
            Yii::app()->user->setFlash('error', 'Failed to remove item.');
        }

        $this->redirect(array('index'));
    }
}
