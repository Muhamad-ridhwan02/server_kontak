<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{   
    protected $table = 'kontak';
    protected $primaryKey = 'no_telp';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'no_telp',
        'nama',
        'grup_id',
    ];
}
