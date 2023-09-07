<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    //use HasFactory;

    protected $fillable = ['kode', 'nama_pesanan', 'quantity', 'harga', 'tanggal', 'nomor_meja', 'keterangan', 'status'];
}
