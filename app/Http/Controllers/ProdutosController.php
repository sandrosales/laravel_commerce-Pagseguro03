<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use CodeCommerce\Tag;


class ProdutosController extends Controller
{
    //
    private $produtoModel;

    public function __construct(Product $produtoModel)
    {
        $this->produtoModel = $produtoModel;
    }



    public function index()
    {
        $produtos = $this->produtoModel->paginate(7);

        return view('produtos.index', compact('produtos'));
    }

    public function create(Category $category)
    {
        $categories = $category->lists('name', 'id');

        return view('produtos.create', compact('categories'));
    }


    public function store(Requests\ProdutoRequest $request)
    {

        $product = $this->produtoModel->fill($request->all());

        $product->save();

        $inputTags = array_map('trim', explode(',', $request->get('tags')));

        $this->storeTag($inputTags,$product->id);

        return redirect()->route('produtos');

    }

    private function storeTag($inputTags, $id)
    {
    /*
        $tag = new Tag();
        $countTags = count($inputTags);
        foreach ($inputTags as $key => $value) {
            $newTag = $tag->firstOrCreate(["name" => $value]);
            $idTags[] = $newTag->id;
        }
        $product = $this->produtoModel->find($id);
        $product->tags()->sync($idTags);
    */
        $tagsIDs = array_map(function($tagName) {
            return Tag::firstOrCreate(['name' => $tagName])->id;
        }, array_filter($inputTags));

        $product = $this->produtoModel->find($id);
        $product->tags()->sync($tagsIDs);


    }


    public function edit($id, Category $category)
    {
    $categories = $category->lists('name', 'id');
        $produtos = $this->produtoModel->find($id);

        return view('produtos.edit', compact('produtos', 'categories'));
    }


    public function update(Requests\ProdutoRequest $request, $id)
    {
        $this->produtoModel->find($id)->update($request->all());

        // Tags

        $inputTags = array_map('trim', explode(',', $request->get('tags')));
        if($inputTags) {
            $this->storeTag($inputTags, $id);
            return redirect()->route('produtos');
        }
        else

        return redirect()->route('produtos');
    }


    public function destroy($id)
    {
        $product = $this->produtoModel->find($id);

        if($product)
        {
            if($product->images)
            {
                foreach ($product->images as $image)
                {
                    if(file_exists(public_path().'/uploads/'.$image->id.'.'.$image->extension))
                    {
                        Storage::disk('public_local')->delete($image->id.'.'.$image->extension);
                    }
                }
                $product->delete();
                return redirect()->route('produtos');
            }
        }
    }



    public function images($id)
    {
        $product = $this->produtoModel->find($id);
        return view('produtos.images', compact('product'));

    }

    public function createImage($id)
    {
        $product = $this->produtoModel->find($id);
        return view('produtos.create_image', compact('product'));


    }

    public function storeImage(Requests\ProductImageRequest $request, $id, ProductImage $productImage)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $image=$productImage::create(['product_id'=>$id, 'extension'=>$extension]);

        Storage::disk('public_local')->put($image->id.'.'.$extension, File::get($file));

        return redirect()->route('produtos.images', ['id'=>$id]);

    }

    public function destroyImage(ProductImage $productImage, $id)
    {
        $image = $productImage->find($id);

        if(file_exists(public_path().'/uploads/'.$image->id.'.'.$image->extension)){
            Storage::disk('public_local')->delete($image->id.'.'.$image->extension);
        }
        $product = $image->product;
        $image->delete();


        return redirect()->route('produtos.images', ['id'=>$product->id]);


    }


}