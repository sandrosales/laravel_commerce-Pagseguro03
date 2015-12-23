<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Order;
use Illuminate\Http\Request;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class OrdersController extends Controller
{
    //

    private $orderModel;


    public function __construct(Order $order)
    {
        $this ->orderModel = $order;

    }


    public function index()
    {
        $orders = $this->orderModel->paginate(10);
        return view('admin.index', compact('orders'));
    }


    public function edit($id)
    {
        $statusList = array(
            0 => "Aguardando Pagamento",
            1 => "Pagamento confirmado",
            2 => "Enviado",
            3 => "Cancelado"
        );
        $order = $this->orderModel->find($id);
        return view('admin.edit', compact('order', 'statusList'));
    }



    public function update(Request $request, $id)
    {
        $input = $request->all();
        $order = $this->orderModel->find($id);
        $order->update($input);
        return redirect()->route('orders');
    }

}
