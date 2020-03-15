<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corona extends Model
{
    protected $table = 'coronas';

    protected $fillable = ['Province/State', 'csv_header', 'csv_data'];
}
