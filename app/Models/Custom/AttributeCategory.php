<?php

namespace App\Models\Custom;

use Illuminate\Database\Eloquent\Model;

class AttributeCategory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'attribute_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'icon',
    ];

    /**
     * Define a one-to-many relationship with the Attribute model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attributes()
    {
        return $this->hasMany(Attribute::class, 'attribute_category_id');
    }
}
