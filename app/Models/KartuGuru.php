<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuGuru extends Model
{
    use HasFactory;
    protected $table = 'kartu_guru';
    protected $primaryKey = 'id_kartu_g';
    protected $fillable = [
        'uid',
        'id_guru',
    ];

    public $timestamps = false;

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }

    public function logKartuGuru()
    {
        return $this->hasMany(LogKartuGuru::class, 'id_kartu_g');
    }
}
