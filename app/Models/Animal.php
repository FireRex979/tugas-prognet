<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Animal extends Model
{
    use SoftDeletes;

    protected $table = 'animals';

    public function suara()
    {
        return $this->belongsTo(Suara::class, 'suara_id', 'id');
    }
}
