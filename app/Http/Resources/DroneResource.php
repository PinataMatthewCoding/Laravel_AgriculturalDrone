<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DroneResource extends JsonResource
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
            "country"=>$this->country,
            "company"=>$this->company,
            "endurance"=>$this->endurance,
            "range"=>$this->range,
            "battery"=>$this->battery,
            "playload_cap"=>$this->playload_cap,
            "max_speed"=>$this->max_speed,
            "user_id"=>$this->user,
            "map_id"=>$this->map,
            "location_id"=>$this->location,
            "drones"=>$this->drones,

        ];
    }
}
