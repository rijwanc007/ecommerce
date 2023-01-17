<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Resources\ProductListResource;
use App\Http\Resources\ProductShowResource;
use Exception;
use App\Traits\UploadAble;
use App\Http\Controllers\API\APIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductImage;
use Modules\Product\Http\Requests\ProductRequestForm;

class ProductController extends APIController {
    use UploadAble;
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }
    public function index(){
        return ProductListResource::collection(Product::with('productCategoriesList','productCategoriesList.category','productImageList','productColorList','productColorList.color','productSizeList','productSizeList.size')->orderBy('id','DESC')->paginate(10));
    }
    public function store(ProductRequestForm $request){
        DB::beginTransaction();
        try{
            $productImage    = [];
            $collection      = collect($request->all())->except('product_category','product_image','product_color','product_size')->merge(['product_slug' => round(microtime(true)*1000).rand()]);
            $product         = Product::create($collection->all());
            if($request->has('product_image')){
                for($j = 0 ; $j < count($request->product_image)/3 ; $j++){
                    $product_image  = $this->upload_base64_image($request->product_image[$j],MATERIAL_IMAGE_PATH);
                    $productImage[] = [
                        'product_id'    => $product->id,
                        'product_image' => $product_image
                    ];
                }
            }
            $product->productCategories()->attach($request->product_category);
            ProductImage::insert($productImage);
            $product->productColor()->attach($request->product_color);
            $product->productSize()->attach($request->product_size);
            $output = ['status' => 'success' , 'message' => 'Product Store Successfully'];
            DB::commit();
        }catch(Exception $e){
            DB::rollBack();
            $output = ['status' => 'error' , 'message' => $e->getMessage()];
        }
        return response()->json($output);
    }
    public function show(Request $request){
        $explode  = explode("-",$request->slug);
        return ProductShowResource::make(Product::with('productCategoriesList','productCategoriesList.category','productImageList','productColorList','productColorList.color','productSizeList','productSizeList.size')->firstWhere(['product_slug' => $explode[1]]));
    }
    public function edit(Request $request){
        $explode  = explode("-",$request->slug);
        return ProductShowResource::make(Product::with('productCategoriesList','productCategoriesList.category','productImageList','productColorList','productColorList.color','productSizeList','productSizeList.size')->firstWhere(['product_slug' => $explode[1]]));
    }
}
