<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\ProductRequest;
use App\Http\Traits\ApiResponse;

class ProductController extends Controller
{

 use ApiResponse;

    public function index(){


       $products=Product::paginate(4);


          if($products->count() == 0){

        return $this->error('products data Not Found',[] ,400);

       }
        return $this->success('products data successfully',ProductResource::collection($products),200);


    }


public function store(ProductRequest $request){

        $validated= $request->validated();


        $product = Product::create($validated);

         if ($request->hasFile('image')) {
    $product->addMediaFromRequest('image')->toMediaCollection('products');

    }




        return $this->success('Product created successfully',new ProductResource($product),201);




}




public function update(ProductRequest $request, $id)
{
    $product = Product::find($id);

    if (!$product) {
        return $this->error('Product not found', [], 404);
    }

    $validated = $request->validated();

    if ($request->hasFile('image')) {

             $product->clearMediaCollection('products');
          $product->addMediaFromRequest('image')->toMediaCollection('products');
    }

    $product->update($validated);

    return $this->success('Product updated successfully', new ProductResource($product),200);



    }



public function  destroy($id){

 $product = Product::find($id);

    if (!$product) {
        return $this->error('Product not found', [], 404);
    }
    $product->clearMediaCollection('products');


    $product->delete();

    return $this->success('Product deleted successfully', null, 200);
}

}
