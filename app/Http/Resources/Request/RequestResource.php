<?php

namespace App\Http\Resources\Request;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RequestResource extends JsonResource
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
            'status' => $this->status,
            'content' => $this->content,
            'category_id' => $this->category_id,
            'client_id' => $this->client_id,
            'lawyer_id' => $this->lawyer_id,
            'answer' => $this->answer,
            'created_at' => $this->created_at->format('d-m-Y')
        ];
    }
}
