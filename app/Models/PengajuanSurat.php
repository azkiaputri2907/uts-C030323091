<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanSurat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pemohon',
        'jenis_surat',
        'tanggal_pengajuan',
        'status',
    ];
}