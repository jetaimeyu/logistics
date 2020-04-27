<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class BaseModel extends Model
{
    use SoftDeletes;
    //
    public function getAttribute($key)
    {
        $key = Str::snake($key);
        return parent::getAttribute($key);
    }
}
