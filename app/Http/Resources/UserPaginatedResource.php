<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserPaginatedResource extends JsonResource
{
    public static $wrap = false;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'items' => UserResource::collection($this->resource->getCollection()),
            'metadata' => [
                'total' => $this->resource->total(),
                'pages' => $this->resource->lastPage(),
                'current' => $this->resource->currentPage(),
                'next' => $this->resource->nextPageUrl(),
                'previous' => $this->resource->previousPageUrl(),
            ]
        ];
    }
}
