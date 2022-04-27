<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)
    {
        $student=Student::create($request->all());
        return response()->json([
            'data'=>$student,
            'message'=>'Tạo sinh viên thành công'
        ],);
    }
}
