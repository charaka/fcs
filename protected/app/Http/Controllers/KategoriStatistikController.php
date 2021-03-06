<?php

namespace App\Http\Controllers;

use App\kategori_statistik;
use Illuminate\Http\Request;

use DB;
use Session;
use DataTables;


/*use App\KategoriStatistik;
use Illuminate\Http\Request;*/


class KategoriStatistikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('kategori_statistik.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $parents = kategori_statistik::pluck('kategori_in','id');

        $parent = array();
        foreach ($parents->toArray() as $key => $obj) {
            $parent[$key] = $obj;
        }
        $data['parents'] = $parent;

        $data['kategori_statistik'] = new kategori_statistik;

        $data['method'] = 'POST';
        $data['route'] = ['kategori_statistik.store'];

        return view('kategori_statistik.form')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $kategori = new kategori_statistik;
        $kategori->kategori_in = $request->kategori_in;
        $kategori->kategori_en = $request->kategori_en;
        $kategori->parent = $request->parent?$request->parent:0;
        $kategori->slug_in = str_slug($request->kategori_in);
        $kategori->slug_en = str_slug($request->kategori_en);

        if($kategori->save()){
            return redirect('kategori_statistik');
        }
       
    }

    /**
     * Display the specified resource.
     *
<<<<<<< Updated upstream
     * @param  \App\kategori_statistik  $kategori_statistik
     * @return \Illuminate\Http\Response
     */
    public function show(kategori_statistik $kategori_statistik)
    {
        //
    }


    public function edit(kategori_statistik $kategori_statistik)
    {
        $parents = kategori_statistik::pluck('kategori_in','id');
        $parent = array();
        foreach ($parents->toArray() as $key => $obj) {
            $parent[$key] = $obj;
        }
        $data['parents'] = $parent;
        $data['kategori_statistik'] = $kategori_statistik;
        $data['method'] = 'PUT';
        $data['route'] = ['kategori_statistik.update',$kategori_statistik->id];

        return view('kategori_statistik.form')->with($data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
<<<<<<< Updated upstream
     * @param  \App\kategori_statistik  $kategori_statistik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kategori_statistik $kategori_statistik)
    {
        $kategori_statistik->kategori_in = $request->kategori_in;
        $kategori_statistik->kategori_en = $request->kategori_en;
        $kategori_statistik->parent = $request->parent?$request->parent:0;
        $kategori_statistik->slug_in = str_slug($request->kategori_in);
        $kategori_statistik->slug_en = str_slug($request->kategori_en);

        if($kategori_statistik->save()){
            return redirect('kategori_statistik');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
<<<<<<< Updated upstream
     * @param  \App\kategori_statistik  $kategori_statistik
     * @return \Illuminate\Http\Response
     */
    public function destroy(kategori_statistik $kategori_statistik)
    {
        $del = $kategori_statistik->delete();
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

    public function listing(Request $request){
        DB::statement(DB::raw('set @rownum = 0'));
        $data = kategori_statistik::leftJoin(DB::raw('(SELECT * FROM kategori_statistiks) AS b'), 
        function($join)
        {
           $join->on('kategori_statistiks.parent', '=', 'b.id');
        })
        ->select([DB::raw('@rownum  := @rownum  + 1 AS no'),'kategori_statistiks.id', 'kategori_statistiks.kategori_in', 'kategori_statistiks.kategori_en','kategori_statistiks.parent','b.kategori_in AS parent']);

        $datatables = Datatables::of($data);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('no', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
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
