<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Cart;
use CodeCommerce\Http\Requests;
use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //
    private $cart;
    private $imagemproduto;

    /**
     * @param Cart $cart
     */

    public function __construct(Cart $cart,Product $product)
    {
        $this->cart = $cart;
        $this->imagemproduto = $product;
    }


    public  function index()
    {
       $produtoImagem = $this->imagemproduto->all();

        if(!Session::has('cart')){
            Session::set('cart',$this->cart);
        }


        return view('store.cart', ['cart'=>Session::get('cart'), 'products' => $produtoImagem]);
    }

    public function add($id)
    {
        $cart = $this->getCart();
        $product = Product::find($id);

        //dd($imagemproduto);
        $cart->add($id, $product->name, $product->price);

        Session::set('cart', $cart);

        return redirect()->route('cart');

    }


    public function destroy($id)
    {
        $cart= $this->getCart();
        $cart->remove($id);
        Session::set('cart',$cart);
        return redirect()->route('cart');

    }

    /**
     * @return Cart
     */
    private function getCart()
    {
        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = $this->cart;
        }
        return $cart;
    }

    public function update($id, $novaQuant)
    {
        $cart = $this->getCart();
        $cart->update($id, $novaQuant);
        Session::set('cart', $cart);
        return redirect()->route('cart');
    }




}
