<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'type', 'size', 'value', 
    ];

    public function storages(){
        return $this->belongsToMany(Storage::class, 'product_storages', 'product_id', 'storage_id');
    }
}
