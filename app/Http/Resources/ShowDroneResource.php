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
            "map_id"=>$this->maps,
            "user_id"=>$this->user,
            "location_id"=>$this->location,
            // "plans"=>$this->plans,
          

            
        ];
    }
}