<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformationController extends Controller
{
     //サイト概要画面
     public function index() {

        
        return view('index/index');
       
   }


    //お問い合わせ
   public function contact() {

       return view('contact/contact');
           
   }

    //お問い合わせ
    public function law() {

        return view('law/law');
            
    }

        //お問い合わせ
   public function terms_of_service() {

    return view('terms_of_service/terms_of_service');
        
}

    //お問い合わせ
    public function privacy() {

        return view('privacy/privacy');
            
    }

        //お問い合わせ
   public function company() {

    return view('company/company');
        
}

}
