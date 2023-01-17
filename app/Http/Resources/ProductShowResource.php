<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductShowResource extends JsonResource{
    public function toArray($request){
        $categoryList = [];
        $imageList    = [];
        $colorList    = [];
        $sizeList     = [];
        foreach ($this->productCategoriesList as $category){
            $categoryList[] = [
                'id'       => $category->product_category_id,
                'category' => $category->category->category_name
            ];
        }
        foreach ($this->productImageList as $image){
            $imageList[] = [
                'id'    => $image->id,
                'image' => config('app.url').'/storage/material/'.$image->product_image
            ];
        }
        foreach ($this->productColorList as $color){
            $colorList[] = [
                'id'    => $color->product_color_id,
                'color' => $color->color->color_name
            ];
        }
        foreach ($this->productSizeList as $size){
            $sizeList[] = [
                'id'   => $size->product_size_id,
                'size' => $size->size->size_name
            ];
        }
        return [
            'productId'    => $this->id,
            'productName'  => $this->product_name,
            'productPrice' => $this->product_price,
            'productSlug'  => $this->product_slug,
            'category'     => $categoryList,
            'image'        => $imageList,
            'color'        => $colorList,
            'size'         => $sizeList
        ];
    }
}
