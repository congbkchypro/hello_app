<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function aboutme()
    {
         $name= 'My name is Hieu';
         $age = 24 ;
         $data = [] ;
         $data['name'] = $name ;
         $data['age'] = $age ;
         // return view("pages.aboutme")->with(
         // 	[
         // 	    'name' => $name,
         // 	    'age' => $age         	 
         // 	]);
         return view('pages.aboutme', $data ) ;
    }

    public function about(){
        return view('pages.about');
    }
     public function contact(){
        return view('pages.contact');
    }

}
