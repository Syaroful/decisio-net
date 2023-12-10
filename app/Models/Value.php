<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    use HasFactory;

    protected $table = 'values';
    public $timestamps = false;
    protected $guarded = [];

    public function criteria(){
        return $this->belongsTo(Criteria::class, 'criteria_id', 'id');
    }

    public function alternative(){
        return $this->belongsTo(Alternative::class, 'alternative_id', 'id');
    }
}
