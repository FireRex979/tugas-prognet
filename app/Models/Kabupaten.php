<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kabupaten extends Model
{
    use SoftDeletes;

    protected $table = 'kabupatens';

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'province_id', 'id');
    }
}
