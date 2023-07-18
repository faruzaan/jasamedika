<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;

    public $primaryKey = 'id_kelurahan';

    protected $table = 'table_kelurahan';

    protected $fillable = [
        'nama_kelurahan', 'nama_kecamatan', 'nama_kota'
    ];
}
