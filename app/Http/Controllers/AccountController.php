<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Order;
use CodeCommerce\User;
use Illuminate\Http\Request;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

    private $user;

    private $order;

    public function __construct(Order $order, User $user)
    {
        $this->order = $order;
        $this->user = $user;
    }


    public function  index()
    {
        $orders = Auth::user()->orders;
        $users = $this->user->all();

        return view('store.conta.home', compact('orders', 'users'));

    }

    public function orders()
    {

        $orders =  Auth::user()->orders;

        return view('store.orders',compact('orders'));

    }

    public function endereco($id)
    {
        $usuario = $this->user->find($id);
        //$usuario =  Auth::user()->orders;
        return view('auth.edit', compact('usuario'));

    }

    public function update($id, Request $request)
    {
        $this->user->find($id)->update($request->all());
        return redirect()->route('account');

    }



}
