<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Product;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    private $produtos;

    public function __construct(Product $product)
    {
        $this->produtos = $product;
    }

    public function index()
    {
        //
        $produtos = $this->produtos->all();

        return view('AdminProducts', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return "Criar um novo Registro em produtos";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
        return "Salva um registro em produtos";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     *
     */
    public function show($id)
    {
        //
        return "Lista registro $id de produtos";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
        return "Edit registro $id de produtos";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
        return "Update registro $id de produtos";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        return "Destroy registro $id de produtos";
    }
}
