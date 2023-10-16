<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BranchesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'address'=>$this->address,
            'cordinates'=>json_decode($this->cordinates),
            'phone1'=>$this->phone1,
            'phone2'=>$this->phone2,
            'open_hour'=>$this->open_hour,
            'close_hour'=>$this->close_hour,
            'open_days'=>json_decode($this->open_days),
            'pictures'=>json_decode($this->pictures),
            'discount'=>$this->discount,
            'description'=>$this->description,
            'fix_delivery'=>$this->fix_delivery,
            'delivery_per_km'=>$this->delivery_per_km,
        ];
    }
}
