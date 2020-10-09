<?php

/*
 * This file is part of Strix.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Strix\Http\Resources\Forum\Thread;

use Illuminate\Http\Resources\Json\JsonResource;

class DefaultThreadResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title' => 'A really cool title',
            'body' => 'super interesting tbh wow epic',
            'created_at' => now()->diffForHumans()
        ];
    }
}
