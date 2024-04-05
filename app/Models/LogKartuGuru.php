<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogKartuGuru extends Model
{
    use HasFactory;
    protected $table = 'log_kartu_guru';
    protected $primaryKey = 'id_log_kartu_g';
    protected $fillable = [
        'id_kartu_g',
        'status',
        'waktu',
        'keterangan'
    ];

    public $timestamps = false;

    public function kartu_guru()
    {
        return $this->belongsTo(KartuGuru::class, 'id_kartu_g');
    }

    
}
