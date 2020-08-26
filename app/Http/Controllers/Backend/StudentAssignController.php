<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Lassign;
use App\LassignDepartments;
use App\Lessons;
use App\Lessonspackageproducts;
use App\Lessonspackages;
use App\StudentLessons;
use App\StudentPackage;
use App\StudentPackages;
use App\Students;
use App\Teachers;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class StudentAssignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['studentlessons']=StudentLessons::where('package_id',null)->get();
        $data['studentpackage']=StudentPackages::all();
        $data['lessons']=Lessons::all();
        $data['package']=Lessonspackages::all();
        $data['packagelessons']=Lessonspackageproducts::all();
        $data['student']=Students::all();
        $data['teacher']=Teachers::all();
        $data['lassign']=Lassign::all();
        $data['lassigndepartment']=LassignDepartments::all();

        return view('backend.studentassign.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['lessons']=Lessons::all();
        $data['student']=Students::all();
        $data['lessonspackage']=Lessonspackages::all();
        $data['packagelessons']=Lessonspackageproducts::all();

        return view('backend.studentassign.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



//        if (!$request->lessons_name==null && !$request->student_name==null){
//
//            if ($request->package=="Paket"){
////            //lessons_id lessonspackages id dir
//
//
//                $var=StudentPackages::where('student_id',$request->student_id)->where('package_id',$request->lessons_id)->first();
//
//                if (!isset($var))
//                {
//
//
//                    $student=StudentPackages::insert([
//                    'student_id' => $request->student_id,
//                    'package_id' =>$request->lessons_id ,
//                    ]);
//
//
//                    if ($student) {
//
//                        return redirect(route('studentassign.index'))->with('success', 'İşlem Başarılı');
//                    }
//                    else
//                    {
//                        return back()->with('error', 'İşlem Başarısız..');
//                    }
//
//                }
//                else
//                {
//                    return back()->with('error', 'Paket daha önce eklenmiştir..');
//                }
//
//
//
//            }
//            elseif($request->package=="Lessons")
//            {
//                //lessons_id lessons id dir
//
//                $var=StudentLessons::where('student_id',$request->student_id)->where('lessons_id',$request->lessons_id)->first();
//
//
//                if (!isset($var))
//                {
//                    $student =StudentLessons::insert([
//                        'student_id' => $request->student_id,
//                        'lessons_id' => $request->lessons_id
//                    ]);
//
//                    if ($student) {
//
//                        return redirect(route('studentassign.index'))->with('success', 'İşlem Başarılı');
//                    }
//                    else
//                    {
//                        return back()->with('error', 'İşlem Başarısız..');
//                    }
//                }
//                else
//                {
//
//                    return back()->with('error', 'Ders daha önce eklenmiştir..');
//                }
//
//
//            }
//
//        }
//        else
//        {
//            return back()->with('error', 'Öğrenci ve Ders  seçimi yapmalısınız..');
//
//        }





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

          $studentassign = Lessons::find(intval($id));
          if (!$studentassign->package_id==null)



        if ($studentassign->delete()) {
            echo 1;
        }
        echo 0;


    }
}
