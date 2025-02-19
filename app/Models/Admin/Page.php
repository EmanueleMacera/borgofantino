<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Page extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'homepage',
        'status',
    ];

    /**
     * Boot method to define model event hooks.
     * Automatically generates the slug from the title on creation.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($page) {
            $page->slug = Str::slug($page->title);
        });
    }

    /**
     * Define a one-to-many relationship with the Block model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function blocks()
    {
        return $this->hasMany(Block::class, 'page_id', 'id');
    }
}
