<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class results extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'id_member', 'round_matches', 'number_matches', 'point', 'result', 'note'
    ];
}
