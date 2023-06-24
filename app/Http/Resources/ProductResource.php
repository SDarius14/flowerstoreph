<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'Product Name' => $this->product_name,
            'Product Description' => $this->product_description,
            'Product Image' => $this->product_image,
            'Quantity' => $this->quantity,
            'Price' => $this->price,
     
        ];
    }
}