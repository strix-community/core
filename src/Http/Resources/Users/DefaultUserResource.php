<?php

/*
 * This file is part of Strix.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Strix\Http\Resources\Users;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @extends JsonResource<\Strix\User>
 */
class DefaultUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id'                      => $this->id,
            'uid'                     => $this->uid,
            'name'                    => $this->name,
            'slug'                    => $this->slug,
            'avatar'                  => $this->getCachedMediaUrl('avatar'),
            'email'                   => $this->email,
            'email_verified_at'       => $this->email_verified_at,
            'email_verified_at_human' => $this->email_verified_at->diffForHumans(),
            'created_at'              => $this->created_at,
            'created_at_human'        => $this->created_at->diffForHumans(),
            'updated_at'              => $this->updated_at,
            'updated_at_human'        => $this->updated_at->diffForHumans(),
        ];
    }
}
