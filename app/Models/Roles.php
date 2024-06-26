<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $primaryKey = 'id_role';
    protected $fillable = [
        'nama_role'
    ];

    protected $timestamps = false;

    public function users()
    {
        return $this->hasMany(User::class, 'id_role', 'id_role');
    }
    
}
