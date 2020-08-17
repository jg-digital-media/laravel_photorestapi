<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $table = "owners";

    protected $fillable = [
        "name",
        "copyright"

    ];

    public function photos() {
        return $this->hasMany( Photo::class );
    }
}
