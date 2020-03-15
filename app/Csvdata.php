<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Csvdata extends Model
{
    protected $table = 'csv_datas';

    protected $fillable = ['csv_filename', 'csv_header', 'csv_data'];
}
