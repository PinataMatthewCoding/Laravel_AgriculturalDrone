<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowMapResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=>$this->id,
            "name"=>$this->name,
            "typeImage"=>$this->typeImage,
            "description"=>$this->description,
            "drone_id"=>$this->drone,
<<<<<<< HEAD
=======

            
>>>>>>> be5c5059756b77d09aa35277a84595feee92e96b
        ];
    }
}
