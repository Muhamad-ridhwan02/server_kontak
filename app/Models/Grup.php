<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grup extends Model
{
    protected $table = 'grup';
    public $incrementing = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'id',
        'nama',
    ];
}
