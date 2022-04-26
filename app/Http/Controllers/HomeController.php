<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    //
    public function index()
    {
        $array = array('toyota' ,'honda' ,'pépi');
        $db = product::all();
       return view('hieu',compact('array','db'));
    }
    public function abc()
    {
        return Redirect::to('https://www.youtube.com/watch?v=dQw4w9WgXcQ');
    }
    public function cba()
    {
        return Redirect::to('https://www.youtube.com/watch?v=4fndeDfaWCg');
    }
}
