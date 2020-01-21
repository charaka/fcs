<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\menu;
use App\lokasi;
use App\kategori;
use App\post;
use App\page;
use App\SlideShow;
use DB;
use Session;

class PublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Session::get('lang')==""){
            session(['lang' => 'en']); 
        }else{

        }

        /*menu*/
        session(['menu' => $this->admin_gen_menu()]);
        /*end menu*/

        return view('front.home.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // MENU
    public function admin_gen_menu() {
        $arrs = DB::table('menus')->orderBy('sort','ASC')->get();

        //dd($arrs);exit();

        return $this->build_menu1($arrs);
    }

    public function build_menu1($arrs,$parent=0, $level=0, $first=1){
        $myPage = $_SERVER['PHP_SELF'];
        
        $init = '<ul class="'.($parent==0&&$level==0?"navbar-nav":($parent!=0&&$level==1?"dropdown-menu":"dropdown-menu")).'" aria-labelledby="'.($parent==0&&$level==0?"":($parent!=0&&$level==1?"dropdown".$parent:"dropdown".$parent)).'">';
            foreach ($arrs as $key=>$arr) {
                if ($arr->parent_id == $parent) {
                $child = menu::where('parent_id',$arr->id)->get();
                $init .= '
                    <li class="nav-item'.(count($child)>0?" dropdown":"").'">
                    <a id="'.(count($child)>0?"dropdown".$arr->id:"").'" data-toggle="'.(count($child)>0?"dropdown":"").'" class="nav-link'.(count($child)>0?" dropdown-toggle":"").'" href="'.url((!empty($arr->model)?'/'.$arr->model.'/':(empty($arr->model)&&!empty($arr->url)?$arr->url:'#')).(Session('lang')=="in"?$arr->slug_in:$arr->slug_en)).'">'.(Session('lang')=='in'?$arr->menu_in:$arr->menu_en).'</a>';
                    $init .= $this->build_menu1($arrs, $arr->id, $level+1, 0);
                    $init .= '</li>';
                }   
            }
        $init .= '</ul>';
        return $init;
    }

    public function lokasi_front($id){
        $lokasi = lokasi::where('slug_en','=',$id)->first();
        
        $slide = SlideShow::where('id_lokasi',$lokasi->id)->first();
        $about = page::where('id_lokasi',$lokasi->id)->where('judul_en','=','About')->first();
        $schedule = page::where('id_lokasi',$lokasi->id)->where('judul_en','=','Schedule')->first();
        $partners = post::where('id_kategori',3)->where('id_lokasi',$lokasi->id)->get();
        $focuses = post::where('id_kategori',4)->where('id_lokasi',$lokasi->id)->get();
        $highlights = post::where('id_kategori',5)->where('id_lokasi',$lokasi->id)->get();
        $segments = post::where('id_kategori',6)->where('id_lokasi',$lokasi->id)->get();

        $data['highlights'] = $highlights;
        $data['segments'] = $segments;
        $data['focuses'] = $focuses;
        $data['partners'] = $partners;
        $data['slide'] = $slide;
        $data['about'] = $about;
        $data['schedule'] = $schedule;
        $data['lokasi'] = $lokasi;

        return view('front.lokasi.index')->with($data);
    }

    public function kategori_front($id){
        return view('front.kategori.index');
    }

    public function about(Request $request){
        return view('front.about.index');
    }

    public function human(Request $request){
        return view('front.human.index');
    }
    public function annual(Request $request){
        return view('front.annual.index');
    }
}
