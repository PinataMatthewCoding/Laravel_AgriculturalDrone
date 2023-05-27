<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowDroneResource extends JsonResource
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
            "drone_id"=>$this->drone_id,
            "country"=>$this->country,
            "company"=>$this->company,
            "endurance"=>$this->endurance,
            "range"=>$this->range,
            "battery"=>$this->battery,
            "playload_cap"=>$this->playload_cap,
            "max_speed"=>$this->max_speed,
<<<<<<< HEAD
            //================
            "user_id"=>$this->user,
            "location_id"=>$this->location,
=======
            "map_id"=>$this->maps,
            "user_id"=>$this->user,
            "location_id"=>$this->location,
            "instruction_id"=>$this->instructions,
          

            
>>>>>>> be5c5059756b77d09aa35277a84595feee92e96b
        ];
    }
}