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
        'name', 'type', 'available_size', 'value', 
    ];

    protected $hidden = ['pivot'];

    const RULE_CREATE = [
        'name' => 'required|string',
        'type' => 'required|string',
        'available_size' => 'required|array',
        'available_size.*' => 'string',
        'value' => 'required|numeric',
        'images' => 'required|array',
        'images.*' => 'string|exists:storages,storage_id'
    ];

    const RULE_UPDATE = [
        'name' => 'string',
        'type' => 'string',
        'available_size' => 'array',
        'available_size.*' => 'string',
        'value' => 'numeric',
        'images' => 'array',
        'images.*' => 'string|exists:storages,storage_id'
    ];

    const CUSTOM_ERROR_MESSAGES = [
        'exists' => 'O valor informado em :attribute é inválido ou não existe na tabela de referência.'
    ];

    const CUSTOM_ATTRIBUTE_NAMES = [];

    public function storages(){
        return $this->belongsToMany(Storage::class, 'product_storages', 'product_id', 'storage_id', null, 'storage_id');
    }
}
