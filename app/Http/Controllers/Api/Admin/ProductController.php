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


       $products=Product::all();

   $data=ProductResource::collection($products);


          if($products->isEmpty()){

        return $this->error('products data Not Found',[] ,400);

       }
        return $this->success('products data successfully',ProductResource::collection($data),200);


    }


public function store(ProductRequest $request){

        $validated= $request->validated();


            if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('products', $imageName, 'public');
            $validated['image'] = 'storage/products/' . $imageName;
        }


        $product = Product::create($validated);


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

            if ($product->image && Storage::disk('public')->exists(str_replace('storage/', '', $product->image))) {
            Storage::disk('public')->delete(
                str_replace('storage/', '', $product->image)
            );
        }

        $image = $request->file('image');
        $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('products', $imageName, 'public');

        $validated['image'] = 'storage/products/' . $imageName;
    }

    $product->update($validated);

    return $this->success('Product updated successfully', new ProductResource($product),200);



    }



public function  destroy($id){

 $product = Product::find($id);

    if (!$product) {
        return $this->error('Product not found', [], 404);
    }

    if ($product->image && Storage::disk('public')->exists($product->image)) {
        Storage::disk('public')->delete($product->image);
    }

    $product->delete();

    return $this->success('Product deleted successfully', null, 200);
}

}
