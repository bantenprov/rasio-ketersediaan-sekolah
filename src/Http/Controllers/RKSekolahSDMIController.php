<?php namespace Bantenprov\RKSekolahSDMI\Http\Controllers;

/* require */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\RKSekolahSDMI\Facades\RKSekolahSDMI;

/* Models */
use Bantenprov\RKSekolahSDMI\Models\Bantenprov\RKSekolahSDMI\RKSekolahSDMI as PdrbModel;
use Bantenprov\RKSekolahSDMI\Models\Bantenprov\RKSekolahSDMI\Province;
use Bantenprov\RKSekolahSDMI\Models\Bantenprov\RKSekolahSDMI\Regency;

/* etc */
use Validator;

/**
 * The RKSekolahSDMIController class.
 *
 * @package Bantenprov\RKSekolahSDMI
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class RKSekolahSDMIController extends Controller
{

    protected $province;

    protected $regency;

    protected $rk_sekolah_sd_mi;

    public function __construct(Regency $regency, Province $province, PdrbModel $rk_sekolah_sd_mi)
    {
        $this->regency  = $regency;
        $this->province = $province;
        $this->rk_sekolah_sd_mi     = $rk_sekolah_sd_mi;
    }

    public function index(Request $request)
    {
        /* todo : return json */

        return 'index';

    }

    public function create()
    {

        return response()->json([
            'provinces' => $this->province->all(),
            'regencies' => $this->regency->all()
        ]);
    }

    public function show($id)
    {

        $rk_sekolah_sd_mi = $this->rk-sekolah-sd-mi->find($id);

        return response()->json([
            'negara'    => $rk-sekolah-sd-mi->negara,
            'province'  => $rk-sekolah-sd-mi->getProvince->name,
            'regencies' => $rk-sekolah-sd-mi->getRegency->name,
            'tahun'     => $rk-sekolah-sd-mi->tahun,
            'data'      => $rk-sekolah-sd-mi->data
        ]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'negara'        => 'required',
            'province_id'   => 'required',
            'regency_id'    => 'required',
            'kab_kota'      => 'required',
            'tahun'         => 'required|integer',
            'data'          => 'required|integer',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'title'     => 'error',
                'message'   => 'add failed',
                'type'      => 'failed',
                'errors'    => $validator->errors()
            ]);
        }

        $check = $this->rk-sekolah-sd-mi->where('regency_id',$request->regency_id)->where('tahun',$request->tahun)->count();

        if($check > 0)
        {
            return response()->json([
                'title'         => 'error',
                'message'       => 'Data allready exist',
                'type'          => 'failed',
            ]);

        }else{
            $data = $this->rk-sekolah-sd-mi->create($request->all());

            return response()->json([
                    'type'      => 'success',
                    'title'     => 'success',
                    'id'      => $data->id,
                    'message'   => 'PDRB '. $this->regency->find($request->regency_id)->name .' tahun '. $request->tahun .' successfully created',
                ]);
        }

    }

    public function update(Request $request, $id)
    {
        /* todo : return json */
        return '';

    }

    public function destroy($id)
    {
        /* todo : return json */
        return '';

    }
}

