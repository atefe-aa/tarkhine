<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FoodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $averageRating = round($this->rating->avg('rating'),1);
        $ratingCount = $this->rating->count();

        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'status'=>$this->status,
            'price'=>$this->price,
            'ingredients'=>$this->ingredients,
            'categories'=>json_decode($this->categories),
            'pictures'=>json_decode($this->pictures),
            'discount'=>$this->discount,
            'description'=>$this->description,
            'rating'=>[
                'stars' => $averageRating,
                'count' => $ratingCount,
            ]
         
        ];
    }
    
}
