<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';

    protected $fillable = [
        'name',
        'email',
        'phone'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function clientProduct()
    {
        return $this->hasMany(ClientProduct::class, 'product_id');
    }
}
