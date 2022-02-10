<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'title' => $this->title,
            'unit' => $this->unit,
            'sub_unit' => $this->sub_unit,
            'description' => $this->description,
            'min_qty_per_unit' => $this->min_qty_per_unit,
            'max_qty_per_unit' => $this->max_qty_per_unit,
            'min_price' => $this->min_price,
            'max_price' => $this->max_price,
        ];
    }
}
