<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RatingResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'       => $this->id,
            'film'     => [
                'id'   => $this->film->id,
                'name' => $this->film->name,
            ],
            'ball'   => $this->ball,
            'created_at' => $this->created_at->toISOString(),
        ];
    }
}
