<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['name', 'description','price','featured','recommend', 'category_id', 'featured', 'recommend'];


    public function images()
    {
        //Esse produto tem muitas imagens

        return $this->hasMany('CodeCommerce\ProductImage');
    }

    public function category()
    {
        // E esse produto pertence a uma categoria
        return $this->belongsTo('CodeCommerce\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('CodeCommerce\Tag');
    }

    public function getNameDescriptionAttribute()
    {
        return $this->name. " - ".$this->description;
    }

    public function getTagListAttribute()
    {
        $tags = $this->tags->lists('name')->toArray();
        return implode(',', $tags);
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured','=',1);
    }

    public function scopeRecommend($query)
    {
        return $query->where('recommend','=',1);
    }

    public function scopeOfCategory($query, $type)
    {
        return $query->where('category_id', '=', $type);
    }


}
