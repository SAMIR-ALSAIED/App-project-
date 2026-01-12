<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\category;
use Illuminate\Http\Request;

use App\Http\Traits\ApiResponse;


use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResourse;
use App\Http\Requests\Admin\CategoryRequest;
use App\Services\CategoriesService;
use PHPUnit\Framework\Constraint\IsEmpty;

class CategoryController extends Controller
{



 use ApiResponse;

 public $CategoriesService;

 public function __construct(CategoriesService $CategoriesService)
 {

$this->CategoriesService=$CategoriesService;

 }

    public function index(){


    $categories= $this->CategoriesService->getCategories();

        if ($categories->count() == 0) {
        return $this->error('Categories data Not Found', [], 400);
    }

        return $this->success('Categories data successfully',CategoryResourse::collection($categories),200);



    }

    public function store(CategoryRequest $request){

        $validated= $request->validated();



        $category = Category::create($validated);

    if ($request->hasFile('image')) {
    $category->addMediaFromRequest('image')->toMediaCollection('categories');

    }


        return $this->success('Category created successfully', new CategoryResourse($category), 201);

    }

    public function destroy($id)
{
    $category = Category::find($id);

    if (!$category) {
        return $this->error('Category not found', [], 404);
    }

    $category->clearMediaCollection('categories');


    $category->delete();

    return $this->success('Category deleted successfully', [], 200);
}

}
