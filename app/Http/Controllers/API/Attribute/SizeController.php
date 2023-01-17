<?php

namespace App\Http\Controllers\API\Attribute;

use App\Http\Controllers\API\APIController;
use App\Http\Controllers\Controller;
use App\Http\Resources\SizeListResource;
use Illuminate\Http\Request;
use Modules\Attribute\Entities\Size;

class SizeController extends APIController {
    public function __construct() {
        $this->middleware('auth:api');
    }
    public function size(){
        return SizeListResource::collection(Size::all());
    }
}
