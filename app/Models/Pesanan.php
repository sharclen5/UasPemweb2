<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
    use HasFactory;
    
    protected $table = 'pesanan';

    protected $fillable = [
        'nama_pesanan',
        'jumlah_pesanan',
        'total_harga',
        'pelanggan_id',
    ];

    public function pelanggan()
    {
        return $this->hasMany(Pelanggan::class);
    }
}
