<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    protected $fillable = ['nama', 'nig', 'ttl','no_tlp','jabatan','mp','status'];
}
