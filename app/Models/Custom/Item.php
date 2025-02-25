<?php

namespace App\Models\Custom;

use Illuminate\Database\Eloquent\Model;
use App\Models\Custom\ItemMedia;
use App\Models\Custom\Attribute;
use App\Models\Custom\Category;

class Item extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'category_id',
        'status',

        'adress',
        'latitude',
        'longitude',
        'nei_dintorni',
        'link',
        'camere',
        'bagni',
        'posti_letto',
    ];

    /**
     * Define a relationship with the ItemMedia model (Photos).
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function itemMedia()
    {
        return $this->hasMany(ItemMedia::class);
    }

    /**
     * Define a relationship with the ItemMedia model (Thumbnail).
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function thumbnail()
    {
        return $this->hasOne(ItemMedia::class)->where('type', 'thumbnail');
    }

    /**
     * Define a many-to-many relationship with the Attribute model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'item_attributes', 'item_id', 'attribute_id')->orderBy('name');
    }

    /**
     * Define a relationship with the Category model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
