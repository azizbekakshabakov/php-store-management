<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\SupplierResource;
use App\Http\Resources\WarehouseResource;

class GoodsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'quantity' => $this->quantity,
            'category' => new CategoryResource($this->category),
            'supplier' => new SupplierResource($this->supplier),
            'warehouse' => new WarehouseResource($this->warehouse)
        ];
    }
}
