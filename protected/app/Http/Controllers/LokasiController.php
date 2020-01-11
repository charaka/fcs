<?php

namespace App\Http\Controllers;

use App\lokasi;
use Illuminate\Http\Request;

use DB;
use DataTables;
class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //
        return view('lokasi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['lokasi'] = new lokasi;
        $data['method'] = 'POST';
        $data['route'] = ['lokasi.store'];

        return view('lokasi.form')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $lokasi = new lokasi;
        $lokasi->lokasi = $request->lokasi;
        $lokasi->slug_in = str_slug($request->lokasi);
        $lokasi->slug_en = str_slug($request->lokasi);

        if($lokasi->save()){
            return redirect('lokasi');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function show(lokasi $lokasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function edit(lokasi $lokasi)
    {
        //
        $data['lokasi'] = $lokasi;
        $data['method'] = 'PUT';
        $data['route'] = ['lokasi.update',$lokasi->id];

        return view('lokasi.form')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lokasi $lokasi)
    {
        //
        $lokasi->lokasi = $request->lokasi;
        $lokasi->slug_in = str_slug($request->lokasi);
        $lokasi->slug_en = str_slug($request->lokasi);

        if($lokasi->save()){
            return redirect('lokasi');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(lokasi $lokasi)
    {
        //
        $del = $lokasi->delete();
        if($del){
            $arr = array(
                'submit' => 1,
                'msg' => 'Berhasil Menghapus Data'
            );
        }else{
            $arr = array(
                'submit' => 0,
                'msg' => 'Gagal Menghapus Data'
            );
        }

        echo json_encode($arr);
    }

    function listing(Request $request){
        DB::statement(DB::raw('set @rownum = 0'));
        $data = lokasi::select([DB::raw('@rownum  := @rownum  + 1 AS no'),'id', 'lokasi']);

        $datatables = Datatables::of($data);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('no', function($query, $keyword) {
                $sql = "@rownum  + 1 like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            });
        }

        return $datatables
        ->addcolumn('action','
                <button class="btn btn-xs btn-warning btn-flat" onclick="show_form({{ $id }})" data-toggle="tooltip" title="Edit Data">
                    <i class="fa fa-pencil"></i>
                </button>
                <button class="btn btn-xs btn-danger btn-flat" data-toggle="tooltip" onclick="delete_data({{ $id }})" title="Delete"><i class="fa fa-times"></i></button>
            ')
        ->make(true);
    }
}
