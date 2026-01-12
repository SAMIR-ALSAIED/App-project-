<?php

namespace App\Services;

use App\Models\category;
use App\Http\Resources\CategoryResourse;


class CategoriesService{


public function getCategories(){



   return  $categories=category::paginate(4);

    //    $data=CategoryResourse::collection($categories);



}



// public function createCategory($request){

// if ($request->hasFile('image')) {
//             $image = $request->file('image');
//             $imageName = time() . '_' . $image->getClientOriginalName();
//             $image->storeAs('categories', $imageName, 'public');
//             $validated['image'] = 'storage/categories/' . $imageName;
//         }

//         $category = Category::create($validated);

//         return $category;
// }


}
