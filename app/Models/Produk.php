<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'nama_produk',
        'harga_produk',
        'stok_produk',
        'pelanggan_id'
    ];

    public function pelanggan()
    {
        return $this->hasMany(Pelanggan::class);
    }
}
