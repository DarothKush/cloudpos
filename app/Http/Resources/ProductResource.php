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
        return[
            'product_id'=>$this->id,
            'product_name'=>$this->name,
            'product_slug'=>$this->slug,
            'product_price'=>$this->price,
            'product_created_at'=>$this->created_at,
            'product_updated_ad'=>$this->updated_at,
            'seller'=>$this->whenLoaded('seller',function(){
                return new UserResource($this->seller);
            })
        ];
    }
}
