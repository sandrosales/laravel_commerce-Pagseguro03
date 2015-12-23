<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;
use Illuminate\Http\Request;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Tag;

class StoreController extends Controller
{

    private $category;

    private $product;

    private $tag;

    public function __construct(Category $category, Product $product, Tag $tag)
    {
        $this->category = $category;
        $this->product = $product;
        $this->tag = $tag;

    }



    public function index()
    {
        $categories = Category::all();

        $pFeatured = Product::featured()->get();

        $pRecommend = Product::recommend()->get();

        return view('store.index', compact('categories', 'pFeatured', 'pRecommend'));
    }


    public function category($id)
    {
        $categories = $this->category->all();
        $category = $this->category->find($id);
        $products = $this->product->ofCategory($id)->get();
        return view('store.category', compact('categories','category', 'products'));
    }

    public function product($id)
    {
        $categories = $this->category->all();
        $product = $this->product->find($id);
        //dd($product);

        return view('store.product', compact('categories', 'product','tags'));
    }

    public function tags($id)
    {
        $tag = $this->tag->find($id);
        $categories = $this->category->all();
        return view('store.tag', compact('tag','categories'));
    }





}
