<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class LogKartuGuru extends Model
{
    use HasFactory;

    protected $table = 'log_kartu_guru';
    protected $primaryKey = 'id_log_kartu_g';
    protected $fillable = [
        'id_kartu_g',   
        'status',
        'keterangan',
    ];

    public $timestamps = false;

    public function setWaktuAttribute($value)
    {
        $this->attributes['waktu'] = $value ?: Carbon::now();
    }

    public function kartuGuru()
    {
        return $this->belongsTo(KartuGuru::class, 'id_kartu_g');
    }
    
}

