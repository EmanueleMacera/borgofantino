<?php

namespace App\Models\Custom;

use Illuminate\Database\Eloquent\Model;

class Promozione extends Model
{
    protected $table = 'promozioni';

    protected $fillable = ['item_id', 'photo', 'title', 'description'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
