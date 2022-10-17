<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['name', 'value', 'description'];

    public function clients()
    {
        return $this->belongsToMany(Client::class);
    }

    public function clientProduct()
    {
        return $this->hasMany(ClientProduct::class);
    }
}
