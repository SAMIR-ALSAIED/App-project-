<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\category;
use Illuminate\Http\Request;

use App\Http\Traits\ApiResponse;


use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResourse;
use App\Http\Requests\Admin\CategoryRequest;


class CategoryController extends Controller
{



 use ApiResponse;

    public function index(){

       $categories=category::all();

       $data=CategoryResourse::collection($categories);

       if($categories->isEmpty()){

        return $this->error('Categories data Not Found',[] ,400);

       }

        return $this->success('Categories data successfully',CategoryResourse::collection($data),200);



    }

    public function store(CategoryRequest $request){

        $validated= $request->validated();


   if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('categories', $imageName, 'public');
            $validated['image'] = 'storage/categories/' . $imageName;
        }

        $category = Category::create($validated);

        return $this->success('Category created successfully', new CategoryResourse($category), 201);

    }

    public function destroy($id)
{
    $category = Category::find($id);

    if (!$category) {
        return $this->error('Category not found', [], 404);
    }

    if ($category->image && file_exists(storage_path('app/public/' . $category->image))) {
        unlink(storage_path('app/public/' . $category->image));
    }

    $category->delete();

    return $this->success('Category deleted successfully', [], 200);
}

}
