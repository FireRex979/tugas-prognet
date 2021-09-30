<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Suara extends Model
{

    protected $table = 'suaras';

    protected $guard = [];

    public static function factoryDatabase()
    {
        $users = factory(self::class, 3)->make();
        return $users;
    }
}
