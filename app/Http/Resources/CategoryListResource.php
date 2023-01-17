<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryListResource extends JsonResource{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'categoryName' => $this->category_name,
        ];
    }
}
