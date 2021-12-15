<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){
        return view('home');
    }
    public function about(){
        return view('pages.about');
    }
    public function contact(){
        return view('pages.contact');
    }
    public function service(){
        return view('pages.service');
    }
    // public function filename($name){
    //     return view('pages.'.$name);
    // }
    public function test(){
        $test = 'kjjdrgkjhrgjh';
        $fruits = ['Mangos', 'Bananas', 'Jack-Fruits'];
        return view('pages.test', compact('test', 'fruits'));
    }
}
