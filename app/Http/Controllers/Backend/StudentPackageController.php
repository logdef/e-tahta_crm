<?php

namespace App\Http\Controllers\Backend;

use App\Departments;
use App\Http\Controllers\Controller;
use App\Lassign;
use App\LassignDepartments;
use App\Lessons;
use App\Lessonspackageproducts;
use App\Lessonspackages;
use App\StudentLessons;
use App\StudentPackages;
use App\Students;
use App\Teachers;
use Illuminate\Http\Request;

class StudentPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['package'] = Lessonspackages::all();
        $data['student'] = Students::all();
        $data['studentpackage'] = StudentPackages::all();
        $data['packagelessons']=Lessonspackageproducts::all();
        $data['lessons']=Lessons::all();
        $data['lassign']=Lassign::all();
        $data['teacher']=Teachers::all();
        return view('backend.studentpackage.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['package'] = Lessonspackages::all();
        $data['student'] = Students::all();
        $data['packagelessons']=Lessonspackageproducts::all();


        $data['lessons']=Lessons::all();
        $data['lassign']=Lassign::all();
        $data['teacher']=Teachers::all();

        return view('backend.studentpackage.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {




        if (!$request->package_name == null && !$request->student_name == null) {

            $var = StudentPackages::where('student_id', $request->student_id)->where('package_id', $request->package_id)->first();

            if (!isset($var)) {
                $student = StudentPackages::insert([
                    'student_id' => $request->student_id,
                    'package_id' => $request->package_id
                ]);


                $packagelessons=Lessonspackageproducts::where('package_id',$request->package_id)->get();
                $departmen=Departments::where('departments_status','0')->first();

                foreach ($packagelessons as $key){
                    $lassigndepartmen=LassignDepartments::where('lassign_id',$key->lassign_id)->where('department_id',$departmen->id)->first();
                    $studentlessons = StudentLessons::insert([
                        'student_id' => $request->student_id,
                        'lassigndepartmen_id' => $lassigndepartmen->id,
                        'start_time' => date('Y-m-d'),
                        'package_id' => $request->package_id
                    ]);
                }

                if ($student) {

                    return redirect(route('studentpackage.index'))->with('success', 'İşlem Başarılı');
                } else {
                    return back()->with('error', 'İşlem Başarısız..');
                }
            } else {

                return back()->with('error', 'Paket daha önce eklenmiştir..');
            }

        } else {
            return back()->with('error', 'Öğrenci ve Ders  seçimi yapmalısınız..');

        }
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
        $data['package'] = Lessonspackages::all();
        $data['packagelessons']=Lessonspackageproducts::all();
        $data['student'] = Students::all();
        $data['studentpackage'] = StudentPackages::where('id', $id)->first();
        $data['lessons']=Lessons::all();


        return view('backend.studentpackage.edit',compact('data'));
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


        if (!$request->lessons_names == null && !$request->student_name == null) {

            $var = StudentPackages::where('student_id', $request->student_id)->where('package_id', $request->lessons_id)->first();

            if (!isset($var)) {
                $student = StudentPackages::where('id',$id)->update([
                    'package_id' => $request->lessons_id
                ]);

                if ($student) {

                    return redirect(route('studentpackage.index'))->with('success', 'İşlem Başarılı');
                } else {
                    return back()->with('error', 'İşlem Başarısız..');
                }
            } else {

                return back()->with('error', 'Paket daha önce eklenmiştir..');
            }

        } else {
            return back()->with('error', 'Öğrenci ve Ders  seçimi yapmalısınız..');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studentpackage = StudentPackages::where('id',$id)->first();
        $deneme=StudentLessons::where('student_id',$studentpackage->student_id)->where('package_id',$studentpackage->package_id)->get();
        foreach ($deneme as $key)
        {
            $key->delete();

        }

        if ($studentpackage->delete()) {
            echo 1;
        }
        echo 0;
    }
}
