<?php

namespace Bantenprov\RKSekolahSDMI\Models\Bantenprov\RKSekolahSDMI;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Regency extends Model
{

    protected $table = 'regencies';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('province_id', 'name');

    public function getProvince()
    {
        return $this->hasOne('Bantenprov\RKSekolahSDMI\Models\Bantenprov\RKSekolahSDMI\Province','id','province_id');
    }

}

