<?php

namespace App\Http\Controllers\Backend;

use App\Departments;
use App\Http\Controllers\Controller;
use App\Lassign;
use App\LassignDepartments;
use App\Lessons;
use App\Schools;
use App\Teachers;
use Illuminate\Http\Request;

class LassignsDepartmentontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['department']=Departments::all();
        $data['lassign']=Lassign::all();
        $data['lessons']=Lessons::all();
        $data['teacher']=Teachers::all();
        $data['lassigndepartmen']=LassignDepartments::all();
        $data['school']=Schools::all();

        return view('backend.lassigndepartment.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['department']=Departments::all();
        $data['lassign']=Lassign::all();
        $data['lessons']=Lessons::all();
        $data['teacher']=Teachers::all();
        return view('backend.lassigndepartment.create',compact('data'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (!$request->teacher_name==null && !$request->departments_name==null)
        {
            $temp=LassignDepartments::where('lassign_id',$request->lessons_id)->where('department_id',$request->departments_id)->first();
            if(!isset($temp)){
                $lassigndepartment=LassignDepartments::insert([
                    'lassign_id'=>$request->lessons_id,
                    'department_id'=>$request->departments_id
                ]);

                if($lassigndepartment)
                {
                    return redirect(route('lassigndepartment.index'))->with('success','İşlem Başarılı');
                }else
                {
                    return back()->with('error','İşlem Başarısız..');

                }
            }else
            {
                return back()->with('error','Şube Daha Önce Oluşturulmuşur...');
            }




        }else
        {
            return back()->with('error', 'Öğretmen ve Şube seçimi yapmalısınız..');
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
        $data['lassigndepartmen']=LassignDepartments::where('id',$id)->first();

        $data['department']=Departments::all();
        $data['lassign']=Lassign::all();
        $data['lessons']=Lessons::all();
        $data['teacher']=Teachers::all();


        return view('backend.lassigndepartment.edit',compact('data'));

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
        if (!$request->teacher_name==null && !$request->departments_name==null)
        {
            $lassigndepartment=LassignDepartments::where('id',$id)->update([
                'lassign_id'=>$request->lessons_id,
                'department_id'=>$request->departments_id
            ]);

            if($lassigndepartment)
            {
                return redirect(route('lassigndepartment.index'))->with('success','İşlem Başarılı');
            }else
            {
                return back()->with('error','İşlem Başarısız..');

            }
        }
        else
        {
            return back()->with('error', 'Öğretmen ve Şube seçimi yapmalısınız..');
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
        $ldepartments = LassignDepartments::find(intval($id));
        if ($ldepartments->delete()){
            echo 1;
        }
        echo 0;
    }
}
