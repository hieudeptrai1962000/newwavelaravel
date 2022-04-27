<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    //
    public function ShowInfo()
    {
//        $array = array('toyota' ,'honda' ,'pépi');
        $db = Student::all();
       return view('main',compact('db'));
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
