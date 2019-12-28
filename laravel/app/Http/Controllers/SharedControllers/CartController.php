<?php

namespace App\Http\Controllers\SharedControllers;

use App\Models\Cart;
use App\Models\Checkout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CartController extends Controller
{

    # show user cart
    public function showUserCart($user_id)
    {
        $cartModel = new Cart();
        $cartItems = $cartModel->getUserCart($user_id);
        return response()->json($cartItems, 200);
    }

    # method for adding item to cart
    public function addToCart(Request $request)
    {
        $cartModel = New Cart();
        $user_id = $request->user_id;
        $product_id = $request->product_id;
        $quantity = $request->quantity;
        $cartItems = $cartModel->addToCart($user_id,$product_id,$quantity);
        return response()->json($cartItems, 201);
    }

    # delete user item
    public function deleteUserItem(Request $request)
    {
        $body = $request->getContent();
        $cartModel = new Cart();
        $cartModel->deleteUserItem($body);
        return response()->json(204);
    }

    # select one Item
    public function showItem($id)
    {
        $cartModel = new Cart();
        $item = $cartModel->getOneItem($id);
        if(!$item){
            abort(404);
        }

            return response()->json($item, 200);

    }


    # update Items
    public function updateItem(Request $request, $id)
    {
        $cartModel = new Cart();
        $quantity = $request->quantity;
        $item = $cartModel->updateUserItem($id,$quantity);
        return response()->json($item, 204);
    }

    # checkout Operations
    public function checkoutSelect($id)
    {
        $model = new Cart();
        $items = $model->checkoutSelect($id);
        return $items;
    }

    public function checkout(Request $request)
    {

        $cartModel = new Cart();
        $checkoutModel = new Checkout();
        $id = $request->getContent();
        $items = $this->checkoutSelect($id);

            foreach($items as $item) {
            $checkoutModel->cart_id = $item->cart_id;
            $checkoutModel->user_id = $item->user_id;
            $checkoutModel->product_id = $item->product_id;
            $checkoutModel->quantity = $item->quantity;
            $checkoutModel->store();

            }

           $cartModel->checkoutDelete($id);

            return response()->json($items, 201);



    }
}
