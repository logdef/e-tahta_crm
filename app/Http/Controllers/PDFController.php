<?php

namespace App\Http\Controllers;

use App\Lessons;
use App\Schools;
use App\Students;
use Illuminate\Http\Request;
use PDF;



class PDFController extends Controller
{
    public function invoice(){


      return view('invoice');


    }


    public function pdf($id){

        $data['student'] = Students::where('user_id',$id)->first();
        $pdf = PDF::loadView('pdf.pdf',compact('data',$data))->setPaper('a4','portrait');
        $filename=$data['student'] ->name;
        return $pdf->stream($filename.'.'.'pdf');
//
//    return $pdf->download($filename.'.'.'pdf');


    }
}















//$data['lessons'] = Lessons::where('id',3)->get();
//$data['schools'] = Schools::all();
//$pdf = PDF::loadView('backend.lesson.index',compact('data',$data) );
//return $pdf->download('a.pdf');
