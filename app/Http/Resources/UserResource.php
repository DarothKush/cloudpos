<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user_id'=>$this->id,
            'user_name'=>$this->name,
            'user_email'=>$this->email,
            'user_created_at'=>$this->created_at,
            'role'=>$this->whenLoaded('role',function(){
                return new RoleResource($this->role);
            })
        ];
    }
}
