<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SizeListResource extends JsonResource{
    public function toArray($request){
        return[
            'id'       => $this->id,
            'sizeName' => $this->size_name
        ] ;
    }
}
