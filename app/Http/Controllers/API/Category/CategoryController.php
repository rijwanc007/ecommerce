<?php

namespace App\Http\Controllers\API\Category;

use App\Http\Controllers\API\APIController;
use App\Http\Resources\CategoryListResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Category\Entities\Category;

class CategoryController extends APIController {
    public function __construct() {
        $this->middleware('auth:api');
    }
    public function category(){
        return CategoryListResource::collection(Category::all());
    }
}
