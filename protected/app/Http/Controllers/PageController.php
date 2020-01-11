<?php

namespace App\Http\Controllers;

use App\page;
use App\post;
use App\page_file;
use App\kategori;
use App\kategori_page;
use App\lokasi;
use Illuminate\Http\Request;

use DB;
use DataTables;
use Session;
class PageController extends Controller
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

        return view('page.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $parents = kategori_page::where('parent',0)->get();

        $opt = "";
        $opt = "<option value=''>Pilih Kategori...</option>";

        foreach ($parents as $key => $parent) {
            $has_child = kategori_page::where('parent',$parent->id)->get();

            if(count($has_child)>0){
                $opt .= "<optgroup label='".$parent->kategori_in."'>";
                foreach ($has_child as $key => $child) {
                    $opt .= "<option value='".$child->id."'>".$child->kategori_in."</option>";
                }
                $opt .= "</optgroup>";
            }else{
                $opt .= "<option value='".$parent->id."'>".$parent->kategori_in."</option>";
            }
        }

        $lokasis = lokasi::pluck('lokasi','id');
        $lokasi = array();
        foreach ($lokasis->toArray() as $key => $obj) {
            $lokasi[$key] = $obj;
        }


        $data['lokasi'] = $lokasi;

        $data['parents'] = $opt;
        $data['page'] = new page;
        return view('page.create')->with($data);
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
        // dd($request->all());
        // exit();
        $page = new page;

        $page->judul_in = $request->judul_in;
        $page->judul_en = $request->judul_en;
        $page->slug_in = str_slug($request->judul_in);
        $page->slug_en = str_slug($request->judul_en);
        $page->konten_in = $request->konten_in;
        $page->konten_en = $request->konten_en;
        $page->id_kategori = $request->id_kategori;
        $page->id_lokasi = $request->id_lokasi;
        $page->tanggal_publish = $this->texttodate($request->tanggal_publish);

        $save = $page->save();

        //$deskripsi = $request->deskripsi_file;
        if($save){
            $file_lampiran = $request->file('file_lampiran');
            if(!empty($file_lampiran)){
                foreach ($file_lampiran as $key => $value) {
                    $this->path = 'protected/storage/uploads/page_files';
                    $fileName = uniqid() . '.' . $value->getClientOriginalExtension();
                    if($value->move($this->path,$fileName)){
                        $filePath = $this->path.'/'.$fileName;
                        $page_file = new page_file;
                        $page_file->id_page = $page->id;
                        $page_file->file = $filePath;
                        $page_file->jenis = 1;
                        $page_file->deskripsi = $request->deskripsi_file[$key];
                        $page_file->save();
                    }else{

                    }

                }
            }else{

            }

            $galeri_lampiran = $request->file('galeri_lampiran');
            if(!empty($galeri_lampiran)){
                foreach ($galeri_lampiran as $key => $value) {
                    $this->path = 'protected/storage/uploads/page_files';
                    $fileName = uniqid() . '.' . $value->getClientOriginalExtension();
                    if($value->move($this->path,$fileName)){
                        $filePath = $this->path.'/'.$fileName;
                        $page_file = new page_file;
                        $page_file->id_page = $page->id;
                        $page_file->file = $filePath;
                        $page_file->jenis = 2;
                        $page_file->save();
                    }else{

                    }

                }
            }else{

            }

            $deskripsi_video = $request->deskripsi_video;
            if(!empty($deskripsi_video)){
                foreach ($deskripsi_video as $key => $value) {
                    if(!empty($value)||$value!=''){
                        $ex = explode('=',$value);
                        $page_file = new page_file;
                        $page_file->id_page = $page->id;
                        $page_file->file = $value!=NULL?$ex[1]:'';
                        $page_file->jenis = 3;
                        $page_file->save();
                    }
                }
            }else{

            }
        }

        return redirect('page');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(page $page)
    {
        //
        $data['page'] = $page;
        $data['file'] = page_file::where('id_page',$page->id)->where('jenis',1)->get();
        $data['galeri'] = page_file::where('id_page',$page->id)->where('jenis',2)->get();
        $data['video'] = page_file::where('id_page',$page->id)->where('jenis',3)->get();
        return view('page.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(page $page)
    {
        //
        $data['id'] = $page->id;
        $data['page'] = $page;
        $parents = kategori_page::where('parent',0)->get();

        $opt = "";
        $opt = "<option value=''>Pilih Kategori...</option>";

        foreach ($parents as $key => $parent) {
            $has_child = kategori_page::where('parent',$parent->id)->get();

            if(count($has_child)>0){
                $opt .= "<optgroup label='".$parent->kategori_in."'>";
                foreach ($has_child as $key => $child) {
                    $opt .= "<option value='".$child->id."' ".($page->id_kategori==$child->id?'selected':'').">".$child->kategori_in."</option>";
                }
                $opt .= "</optgroup>";
            }else{
                $opt .= "<option value='".$parent->id."' ".($page->id_kategori==$parent->id?'selected':'').">".$parent->kategori_in."</option>";
            }
        }


        $lokasis = lokasi::pluck('lokasi','id');
        $lokasi = array();
        foreach ($lokasis->toArray() as $key => $obj) {
            $lokasi[$key] = $obj;
        }


        $data['lokasi'] = $lokasi;
        $data['parents'] = $opt;
        $data['file'] = page_file::where('id_page',$page->id)->where('jenis',1)->get();
        $data['galeri'] = page_file::where('id_page',$page->id)->where('jenis',2)->get();
        $data['videos'] = page_file::where('id_page',$page->id)->where('jenis',3)->get();
        return view('page.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, page $page)
    {
        //
        $page->judul_in = $request->judul_in;
        $page->judul_en = $request->judul_en;
        $page->slug_in = str_slug($request->judul_in);
        $page->slug_en = str_slug($request->judul_en);
        $page->konten_in = $request->konten_in;
        $page->konten_en = $request->konten_en;
        $page->id_kategori = $request->id_kategori;
        $page->id_lokasi = $request->id_lokasi;
        $page->tanggal_publish = $this->texttodate($request->tanggal_publish);

        $save = $page->save();

        //$deskripsi = $request->deskripsi_file;
        if($save){
            $file_lampiran = $request->file('file_lampiran');
            if(!empty($file_lampiran)){
                foreach ($file_lampiran as $key => $value) {
                    $this->path = 'protected/storage/uploads/page_files';
                    $fileName = uniqid() . '.' . $value->getClientOriginalExtension();
                    if($value->move($this->path,$fileName)){
                        $filePath = $this->path.'/'.$fileName;
                        $page_file = new page_file;
                        $page_file->id_page = $page->id;
                        $page_file->file = $filePath;
                        $page_file->jenis = 1;
                        $page_file->deskripsi = $request->deskripsi_file[$key];
                        $page_file->save();
                    }else{

                    }

                }
            }else{

            }

            $galeri_lampiran = $request->file('galeri_lampiran');
            if(!empty($galeri_lampiran)){
                foreach ($galeri_lampiran as $key => $value) {
                    $this->path = 'protected/storage/uploads/page_files';
                    $fileName = uniqid() . '.' . $value->getClientOriginalExtension();
                    if($value->move($this->path,$fileName)){
                        $filePath = $this->path.'/'.$fileName;
                        $page_file = new page_file;
                        $page_file->id_page = $page->id;
                        $page_file->file = $filePath;
                        $page_file->jenis = 2;
                        $page_file->save();
                    }else{

                    }

                }
            }else{

            }

            $deskripsi_video = $request->deskripsi_video;
            if(!empty($deskripsi_video)){
                foreach ($deskripsi_video as $key => $value) {
                    if(!empty($value)||$value!=''){
                        $ex = explode('=',$value);
                        $page_file = new page_file;
                        $page_file->id_page = $page->id;
                        $page_file->file = $value!=NULL?$ex[1]:'';
                        $page_file->jenis = 3;
                        $page_file->save();
                    }
                }
            }else{

            }
        }

        return redirect('page');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(page $page)
    {
        //
        $del = $page->delete();
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
        $data = page::select([DB::raw('@rownum  := @rownum  + 1 AS no'),'id', 'judul_in', 'judul_en','konten_in','konten_en','status']);

        $datatables = Datatables::of($data);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('no', function($query, $keyword) {
                $sql = "@rownum  + 1 like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            });
        }

        return $datatables
        ->addcolumn('konten_in','{{ strip_tags($konten_in) }}')
        ->addcolumn('action','
                <a class="btn btn-xs btn-info btn-flat" href="{{ url("page/$id") }}" data-toggle="tooltip" title="Info Data">
                    <i class="fa fa-info-circle"></i>
                </a>
                <a class="btn btn-xs btn-warning btn-flat" href="{{ url("page/$id/edit") }}" data-toggle="tooltip" title="Edit Data">
                    <i class="fa fa-pencil"></i>
                </a>
                <a class="btn btn-xs btn-danger btn-flat" data-toggle="tooltip" onclick="delete_data({{ $id }})" title="Delete"><i class="fa fa-times"></i></a>
            ')
        ->addcolumn('status_id','<label class="switch"><input type="checkbox" onclick="aktif_post({!! $id !!})" {{ ($status==1?"checked":"") }}><span class="slider"></span></label>')
        ->rawColumns(['konten_in','action','status_id'])
        ->make(true);
    }

   

    public function aktif_post(Request $request){
        $cek = page::where('id',$request->id)->first();
        $stat = "";
        if($cek->status==1){
            $stat = 0;
        }else if($cek->status==0){
            $stat = 1;
        }
        $updt = page::where('id', $request->id)
          ->update(['status' => $stat]);

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
