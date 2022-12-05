<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;

    protected $fillable = ['id_transaksi', 'id_produk', 'tgl_transaksi', 'jumlah', 'harga'];
}
