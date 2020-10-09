<?php

/*
 * This file is part of Strix.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Strix\Models\Media;

use Strix\Traits\Models\HasNanoId;

/**
 * Strix\Models\Media\Media.
 *
 * @property int                             $id
 * @property string                          $uid
 * @property string                          $model_type
 * @property int                             $model_id
 * @property string                          $collection_name
 * @property string                          $name
 * @property string                          $file_name
 * @property string|null                     $mime_type
 * @property string                          $disk
 * @property string|null                     $conversions_disk
 * @property int                             $size
 * @property array                           $manipulations
 * @property array                           $custom_properties
 * @property array                           $responsive_images
 * @property int|null                        $order_column
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $extension
 * @property-read string $human_readable_size
 * @property-read string $type
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $model
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Media\Media newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Media\Media newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\MediaLibrary\MediaCollections\Models\Media ordered()
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Media\Media query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Media\Media whereCollectionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Media\Media whereConversionsDisk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Media\Media whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Media\Media whereCustomProperties($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Media\Media whereDisk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Media\Media whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Media\Media whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Media\Media whereManipulations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Media\Media whereMimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Media\Media whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Media\Media whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Media\Media whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Media\Media whereOrderColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Media\Media whereResponsiveImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Media\Media whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Media\Media whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Strix\Models\Media\Media whereUpdatedAt($value)
 * @mixin \Eloquent
 *
 * @method static \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|static[] all($columns = ['*'])
 * @method static \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|static[] get($columns = ['*'])
 */
class Media extends \Spatie\MediaLibrary\MediaCollections\Models\Media
{
    use HasNanoId;

    public static function bootHasUuid(): void
    {
    }
}
