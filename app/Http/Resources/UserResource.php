<?php

namespace app\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Ресурс для модели User
 */
class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var User $user */
        $user = $this->resource;

        return [
            'id' => $user->id,
            'email' => $user->email,
            'name' => $user->name,
            'comment' => $user->comment,
            'ip' => $user->ip,
        ];
    }
}
