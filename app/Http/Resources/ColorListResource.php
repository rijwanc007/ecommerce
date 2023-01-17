<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ColorListResource extends JsonResource{
    public function toArray($request){
        return[
            'id'        => $this->id,
            'colorName' => $this->color_name,
        ];
    }
}
