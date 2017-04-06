<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class monUser extends Model
{
    public function avatars()
    {
        return $this->hasMany(Avatar::class);
    }
}
