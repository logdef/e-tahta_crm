<?php

namespace App\Http\Controllers\Backend;

use App\Departments;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['departments'] = Departments::all();
        return view('backend.department.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.department.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_int(intval($request->lessons_price)))
        {
            $request->validate([
                'departments_name' => 'required',
                'departments_number' => 'required',
            ]);
            $departments = Departments::insert([
                'departments_name' => $request->departments_name,
                'departments_number' => $request->departments_number,

            ]);

            if ($departments) {

                return redirect(route('departments.index'))->with('success', 'İşlem Başarılı');
            }
            else
            {
                return back()->with('error', 'İşlem Başarısız..');
            }



        }
        else
        {
            return back()->with('error', 'Şube Maksimum Öğrenci Sayısı Sayı olmalıdır..');
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
        $data = Departments::where('id', $id)->first();
        return view('backend.department.edit')->with('data', $data);
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
        if (is_int(intval($request->lessons_price)))
        {
            $request->validate([
                'departments_name' => 'required',
                'departments_number' => 'required',
            ]);
            $departments = Departments::where('id',$id)->update([
                'departments_name' => $request->departments_name,
                'departments_number' => $request->departments_number,

            ]);

            if ($departments) {

                return redirect(route('departments.index'))->with('success', 'İşlem Başarılı');
            }
            else
            {
                return back()->with('error', 'İşlem Başarısız..');
            }



        }
        else
        {
            return back()->with('error', 'Şube Maksimum Öğrenci Sayısı Sayı olmalıdır..');
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
        $departments = Departments::find(intval($id));
        if ($departments->delete()) {
            echo 1;
        }
        echo 0;
    }
}
