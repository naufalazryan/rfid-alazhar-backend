<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'guru';
    protected $primaryKey = 'id_guru';
    public $timestamps = false;
    protected $fillable = [
        'nip',
        'nama_guru',
        'jenis_kelamin',
        'jabatan',
        'tempat_lahir',
        'tanggal_lahir'
    ];

    public function walas ()
    {
        return $this->hasMany(Walas::class, 'id_guru');
    }

    public function kartu_g ()
    {
        return $this->hasMany(KartuGuru::class, 'id_guru');
    }

}
