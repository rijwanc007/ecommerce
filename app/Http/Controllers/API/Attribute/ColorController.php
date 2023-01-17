<?php

namespace App\Http\Controllers\API\Attribute;

use App\Http\Controllers\API\APIController;
use App\Http\Resources\ColorListResource;
use Illuminate\Http\Request;
use Modules\Attribute\Entities\Color;

class ColorController extends APIController {
    public function __construct() {
        $this->middleware('auth:api');
    }
    public function color(){
        return ColorListResource::collection(Color::all());
    }
}
