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
        'jk',
        'jabatan',
        'tempat_lahir',
        'tgl_lahir'
    ];

    public function walas ()
    {
        return $this->hasMany(Walas::class, 'id_guru');
    }

    public function getFormattedTglLahirAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['tgl_lahir'])->format('d/m/Y');
    }

}
