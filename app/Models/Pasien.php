<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    public $primaryKey = 'id_pasien';

    protected $table = 'table_pasien';

    protected $fillable = [
        'id_pasien', 'nama', 'nama_kota', 'alamat', 'no_telepon', 'rt_rw', 'id_kelurahan', 'tanggal_lahir', 'jenis_kelamin'
    ];
    public function kelurahan()
    {
        return $this->hasOne('\App\Models\Kelurahan', 'id_kelurahan','id_kelurahan');
    }
}
