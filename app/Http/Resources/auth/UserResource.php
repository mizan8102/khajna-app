<?php

namespace App\Http\Resources\auth;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,

            'email' => $this->email,
            'company_id' => $this->company_id,
            'branch_id' => $this->branch_id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'store_id' => $this->store_id,
            'created_at' => (new DateTime($this->created_at))->format('Y-m-d H:i:s'),
        ];
    }
}
