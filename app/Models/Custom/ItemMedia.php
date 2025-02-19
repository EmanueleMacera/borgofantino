<?php

namespace App\Models\Custom;

use Illuminate\Database\Eloquent\Model;
use App\Models\Custom\Item;

class ItemMedia extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'item_media';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'item_id',
        'path',
        'type',
    ];

    /**
     * Define a relationship with the Item model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    /**
     * Determine if the media is a thumbnail.
     *
     * @return bool
     */
    public function getIsThumbnailAttribute()
    {
        return $this->type === 'thumbnail';
    }

    /**
     * Determine if the media is a photo.
     *
     * @return bool
     */
    public function getIsPhotoAttribute()
    {
        return $this->type === 'photo';
    }
}
