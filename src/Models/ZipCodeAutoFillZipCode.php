<?php

namespace Seus31\ZipCodeAutoFill\Models;

use Illuminate\Database\Eloquent\Model;

class ZipCodeAutoFillZipCode extends Model
{
    protected $table = 'zip_code_auto_fill_zip_codes';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'local_government_code',
        'zipcode',
        'prefecture',
        'city',
        'address',
    ];
}
