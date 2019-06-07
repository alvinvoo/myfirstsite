<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function home(){
        $tasks = [
            'Go to the store',
            'Go to the market',
            'Go to work'
        ];
    
        return view('welcome',[
            'tasks' => $tasks,
            'foo' => request('title','default title boi')
        ]);
    }

    public function about(){
        return view('about');
    }

    public function contact() {
        return view('contact');
    }
}
