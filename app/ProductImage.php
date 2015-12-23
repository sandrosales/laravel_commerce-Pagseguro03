<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    //
    protected $fillable = ['product_id', 'extension'];


    public function product()
    {
        //Essa imagem pertence a um Produto

        return $this->belongsTo('CodeCommerce\Product');

    }


}
