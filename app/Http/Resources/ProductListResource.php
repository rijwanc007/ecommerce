<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductListResource extends JsonResource{
    public function toArray($request){
        $categoryList = [];
        $imageList    = [];
        $colorList    = [];
        $sizeList     = [];
        foreach ($this->productCategoriesList as $category){
            $categoryList[] = [
                'category' => $category->category->category_name
            ];
        }
        foreach ($this->productImageList as $image){
            $imageList[] = [
                'image' => config('app.url').'/storage/material/'.$image->product_image
            ];
        }
        foreach ($this->productColorList as $color){
            $colorList[] = [
                'color' => $color->color->color_name
            ];
        }
        foreach ($this->productSizeList as $size){
            $sizeList[] = [
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
