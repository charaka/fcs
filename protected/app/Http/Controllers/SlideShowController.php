<?php

namespace App\Http\Controllers;

use App\SlideShow;
use App\lokasi;
use Illuminate\Http\Request;

use DB;
use DataTables;

class SlideShowController extends Controller
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
        return view('slideshow.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $lokasis = lokasi::pluck('lokasi','id');
        $lokasi = array();
        foreach ($lokasis->toArray() as $key => $obj) {
            $lokasi[$key] = $obj;
        }


        $data['lokasi'] = $lokasi;

        $data['slide_show'] = new SlideShow;
        return view('slideshow.create')->with($data);
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
        $slide_show = new SlideShow;

        $slide_show->judul_in = $request->judul_in;
        $slide_show->judul_en = $request->judul_en;
        $slide_show->deskripsi_in = $request->deskripsi_in;
        $slide_show->deskripsi_en = $request->deskripsi_en;
        $slide_show->url = $request->url;
        $slide_show->id_lokasi = $request->id_lokasi;

        $save = $slide_show->save();

        if($save){
            $image = $request->file('image');
            if(!empty($image)){
                    $this->path = 'protected/storage/uploads/slide_show';
                    $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
                    if($image->move($this->path,$fileName)){
                        $filePath = $this->path.'/'.$fileName;
                        $detail_slide_show = SlideShow::find($slide_show->id);
                        $detail_slide_show->image = $filePath;
                        $detail_slide_show->save();
                    }else{

                    }
            }else{

            }
        }

        return redirect('slide_show');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SlideShow  $slideShow
     * @return \Illuminate\Http\Response
     */
    public function show(SlideShow $slideShow)
    {
        //
        $data['slide_show'] = $slideShow;

        return view('slideshow.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SlideShow  $slideShow
     * @return \Illuminate\Http\Response
     */
    public function edit(SlideShow $slideShow)
    {
        //
        $lokasis = lokasi::pluck('lokasi','id');
        $lokasi = array();
        foreach ($lokasis->toArray() as $key => $obj) {
            $lokasi[$key] = $obj;
        }


        $data['lokasi'] = $lokasi;
        $data['id'] = $slideShow->id;
        $data['slide_show'] = $slideShow;
        return view('slideshow.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SlideShow  $slideShow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SlideShow $slideShow)
    {
        //

        $slideShow->judul_in = $request->judul_in;
        $slideShow->judul_en = $request->judul_en;
        $slideShow->deskripsi_in = $request->deskripsi_in;
        $slideShow->deskripsi_en = $request->deskripsi_en;
        $slideShow->url = $request->url;
        $slideShow->id_lokasi = $request->id_lokasi;
        $save = $slideShow->save();

        if($save){
            $image = $request->file('image');
            if(!empty($image)){
                    $this->path = 'protected/storage/uploads/slide_show';
                    $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
                    if($image->move($this->path,$fileName)){
                        $filePath = $this->path.'/'.$fileName;
                        $detail_slide_show = SlideShow::find($slideShow->id);
                        $detail_slide_show->image = $filePath;
                        $detail_slide_show->save();
                    }else{

                    }
            }else{

            }
        }

        return redirect('slide_show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SlideShow  $slideShow
     * @return \Illuminate\Http\Response
     */
    public function destroy(SlideShow $slideShow)
    {
        //
        $del = $slideShow->delete();
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
        $data = SlideShow::select([DB::raw('@rownum  := @rownum  + 1 AS no'),'id', 'judul_in', 'judul_en','deskripsi_in','deskripsi_en','image','status_id','url']);

        $datatables = Datatables::of($data);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('no', function($query, $keyword) {
                $sql = "@rownum  + 1 like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            });
        }

        return $datatables
        ->addcolumn('image','<img src="{{ url($image) }}" width="100%">')
        ->addcolumn('action','
                <a class="btn btn-xs btn-info btn-flat" href="{{ url("slide_show/$id") }}" data-toggle="tooltip" title="Info Data">
                    <i class="fa fa-info-circle"></i>
                </a>
                <a class="btn btn-xs btn-warning btn-flat" href="{{ url("slide_show/$id/edit") }}" data-toggle="tooltip" title="Edit Data">
                    <i class="fa fa-pencil"></i>
                </a>
                <a class="btn btn-xs btn-danger btn-flat" data-toggle="tooltip" onclick="delete_data({{ $id }})" title="Delete"><i class="fa fa-times"></i></a>
            ')
        ->addcolumn('status_id','<label class="switch"><input type="checkbox" onclick="aktif_post({!! $id !!})" {{ ($status_id==1?"checked":"") }}><span class="slider"></span></label>')
        ->rawColumns(['action','image','status_id'])
        ->make(true);
    }

    public function aktif_post(Request $request){
        $cek = SlideShow::where('id',$request->id)->first();
        $stat = "";
        if($cek->status_id==1){
            $stat = 0;
        }else if($cek->status_id==0){
            $stat = 1;
        }
        $updt = SlideShow::where('id', $request->id)
          ->update(['status_id' => $stat]);

        if($updt){
            $arr = array(
                "submit"=>1,
                "msg" => "Berhasil Memperbaharui Data"
            );
        }else{
            $arr = array(
                "submit"=>0,
                "msg" => "Gagal Memperbaharui Data"
            );
        }

        echo json_encode($arr);
    }

}
