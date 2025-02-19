<?php

namespace App\Models\Custom;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'attributes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'icon', 'attribute_category_id'];

    /**
     * Define a relationship with the AttributeCategory model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function macroCategory()
    {
        return $this->belongsTo(AttributeCategory::class, 'attribute_category_id');
    }

    /**
     * Define a many-to-many relationship with the Item model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function items()
    {
        return $this->belongsToMany(Item::class, 'item_attributes', 'attribute_id', 'item_id');
    }
}
