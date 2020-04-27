<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = ['score', 'date_generated'];

    public function getCreatedAtAttribute($value)
    {
        $parse = Carbon::parse($value);
        return $parse->format('D h:i');
    }
}