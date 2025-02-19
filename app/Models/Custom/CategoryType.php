<?php

namespace App\Models\Custom;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryType extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'category_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'thumbnail',
        'slug',
    ];

    /**
     * Define a one-to-many relationship with the Category model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        return $this->hasMany(Category::class, 'type_id');
    }
}
