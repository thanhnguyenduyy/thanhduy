<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class members extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'images', 'note', 'delete_flg'
    ];
}
