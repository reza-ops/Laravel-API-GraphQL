<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PhoneResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'data' => [
                'name' => $this->name,
                'description' => $this->description,
                'price' => $this->price,
            ],
            'message' => 'Success Added Data'
        ];
    }
}
