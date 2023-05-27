<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FarmResource extends JsonResource
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
            "address"=>$this->address,
<<<<<<< HEAD
            //=================
            "map_id"=>$this->map
=======
            // "map_id"=>FarmResource::collection($this->maps)
>>>>>>> be5c5059756b77d09aa35277a84595feee92e96b
        ];
    }
}
