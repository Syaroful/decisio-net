<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;
    protected $table = 'criterias';
    public $timestamps = false;

    protected $fillable = [
        'id', // tambahkan ini
        'name',
        'type',
        'weight',
    ];
}
