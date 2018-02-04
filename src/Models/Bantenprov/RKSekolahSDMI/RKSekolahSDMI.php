<?php

namespace Bantenprov\RKSekolahSDMI\Models\Bantenprov\RKSekolahSDMI;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RKSekolahSDMI extends Model
{

    protected $table = 'rk_sekolah_sd_mis';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('negara', 'province_id', 'kab_kota', 'regency_id', 'tahun', 'data');

    public function getProvince()
    {
        return $this->hasOne('Bantenprov\RKSekolahSDMI\Models\Bantenprov\RKSekolahSDMI\Province','id','province_id');
    }

    public function getRegency()
    {
        return $this->hasOne('Bantenprov\RKSekolahSDMI\Models\Bantenprov\RKSekolahSDMI\Regency','id','regency_id');
    }

}

