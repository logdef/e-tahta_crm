<?php

namespace App\Http\Controllers\Backend;

use App\Departments;
use App\Http\Controllers\Controller;
use App\Lassign;
use App\LassignDepartments;
use App\LessonDepartments;
use App\Lessons;
use App\Schools;
use App\Teachers;
use Illuminate\Http\Request;

class LassignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['lassign']=Lassign::all();
        $data['teacher']=Teachers::all();
        $data['lessons']=Lessons::all();
        return view('backend.lessonassign.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->school_name==0 && $request->school_year==0)
        {
            $data['lessons']=Lessons::all();

        }elseif ($request->school_name>0 && $request->school_year==0)
        {
            $data['lessons']=Lessons::where('school_name',$request->school_name)->get();

        }
        elseif ($request->school_name==0 && $request->school_year > 0)
        {
            $data['lessons']=Lessons::where('school_year',$request->school_year)->get();
        }elseif ($request->school_name>0 && $request->school_year > 0)
        {
            $data['lessons']=Lessons::where('school_name',$request->school_name)->where('school_year',$request->school_year)->get();
        }

        $data['teacher']=Teachers::all();
        $data['lessonsdepartment']=LessonDepartments::all();
        $data['school']=Schools::all();
        $data['department']=Departments::all();


        return view('backend.lessonassign.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $teachers_id=


        if (!$request->lessons_name==null && !$request->teacher_name==null){

            $temp=Lassign::where('lessons_id',$request->lessons_id)->where('users_id',$request->teachers_id)->first();
            if (!isset($temp))
            {
                $lesson=Lassign::create([
                'lessons_id'=>$request->lessons_id,
                'users_id'=>$request->teachers_id
                ]);

                $lassign_id=$lesson->id;
                $department=Departments::where('departments_status','0')->first();
                $department_id=$department->id;

            $lassigndepartment=LassignDepartments::insert([

                'lassign_id'=>$lassign_id,
                'department_id'=>$department_id
            ]);
            echo $department_id;

                if($lesson && $lassigndepartment)
                {
                    return redirect(route('lassign.index'))->with('success','İşlem Başarılı');
                }else
                {
                    return back()->with('error','İşlem Başarısız..');

                }

            }else
            {

                    return back()->with('error','Ders Aynı Hocaya Daha Önce Atanmıştır....');


            }


        }
        else
        {
            return back()->with('error', 'Öğretmen ve Ders  seçimi yapmalısınız..');

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
        $data['lessons']=Lessons::all();
        $data['teacher']=Teachers::all();
        $lassign=Lassign::where('id',$id)->first();
        return view('backend.lessonassign.edit',compact('data'))->with('lassign',$lassign);
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

        $lesson=Lassign::where('id',$id)->update([
            'lessons_id'=>$request->lessons_id,
            'users_id'=>$request->teachers_id
        ]);
        if($lesson)
        {
            return redirect(route('lassign.index'))->with('success','İşlem Başarılı');
        }
        return back()->with('error','İşlem Başarısız..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lassign = Lassign::find(intval($id));
        if ($lassign->delete()){
           echo 1;
        }
        echo 0;
    }

}
