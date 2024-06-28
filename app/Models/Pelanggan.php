<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelanggan extends Model
{
    use HasFactory;
    
    protected $table = 'pelanggan';

    protected $fillable = [
        'nama',
        'email',
        'no_hp',
        'jenis_kelamin',
        'pesanan_id',
        'pembayaran_id',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }
}
