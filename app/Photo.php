<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $table = "photos";

    protected $fillable = [
        
        "title",
        "caption",
        "copyright",
        "email",
        "owner_id"

    ];

    public function owner() {
        return $this->belongsTo( Owner::class );

    }
}
