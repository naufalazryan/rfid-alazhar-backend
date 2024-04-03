<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Walas extends Model
{
    use HasFactory;
    protected $table = 'walas';
    protected $primaryKey = 'id_walas';
    protected $fillable = [
        'id_guru',
        'id_kelas',
        'id_user'
    ];
    
    public $timestamps = false;

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru', 'id_guru');
    }
}
