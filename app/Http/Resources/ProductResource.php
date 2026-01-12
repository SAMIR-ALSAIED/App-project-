<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

        'ID_Product'=>$this->id,
        'Name'=>$this->name,
        'Price'=>$this->price,
           'image' => $this->image ? url($this->image) : null,
        'Description'=>$this->description,
        'category_id '=>$this->category_id

        ];
    }
}
