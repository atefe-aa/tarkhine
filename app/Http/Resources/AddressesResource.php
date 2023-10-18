<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use function PHPUnit\Framework\isNull;

class AddressesResource extends JsonResource
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
            "customer_id"=>$this->customer_id,
            "title"=>$this->title,
            "is_customer_receiver"=>$this->is_customer_receiver,
            "receiver_name"=> !isNull($this->receiver_name) ? $this->receiver_name : $this->customer->show_name,
            "receiver_phone"=>!isNull($this->receiver_phone) ? $this->receiver_phone : $this->customer->phone,
            "address"=>$this->address,
            "cordinates"=>json_decode($this->cordinates),
        ];
    }
}
