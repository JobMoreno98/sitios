<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\Menu;
use App\Models\Secciones;
use App\Models\Banners;

class HomeController extends Controller
{
    public  $sitio;

    public function inicio(){
        $sitios = Home::where('activo',1)->get();
        return view('welcome',compact('sitios'));
    }

    public function index($nombre){
        $this->sitio = $nombre;
        $menu = collect($this->menu());
        $slides = $this->slide();
        return view('index', compact('menu','slides','nombre'));

    }
    public function seccion01($nombre,$menu){
        $secciones = Secciones::where('sitio',$nombre)->get();
        return $secciones;
    }
    public function menu(){
        $menu = Menu::where('sitio',$this->sitio)->get();
        $menu_p = array();
        foreach($menu as $key => $value){
            
            if(strcmp($value->father,'none') != 0 ){
                $sub = Menu::select('nombre')->where('sitio',$this->sitio)->where('father',$value->father)->get()->toArray();
                if(array_key_exists($value->father, $menu_p)){
                    if($menu_p[$value->father] != $sub){
                        $menu_p[$value->father] += $sub;
                    }                    
                }               
            }else{
                $menu_p[$value->nombre] =[];
            }
        }
        return $menu_p;
    }

    public function slide(){
        $banners = Banners::where('sitio',$this->sitio)->where('activo',1)->orderBy('orden')->get();
        return $banners;
    }
    

}
