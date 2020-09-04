<?php

namespace App\Http\Controllers\Backend;

use App\Departments;
use App\Http\Controllers\Controller;
use App\Lassign;
use App\LassignDepartments;
use App\Teachers;
use Illuminate\Http\Request;
use App\Lessons;
use Illuminate\Support\Facades\View;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['class']=Lessons::all();
        return  view('backend.class.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    public function teacher (Request $request)
    {
        $data['teacher']=Teachers::all();
        $data['lassign']=Lassign::where('lessons_id',$request->lessons_id)->get();
        return  view('backend.class.lassign',compact('data'));
    }
    public function department (Request $request)
    {

        $data['lassign_departments']=LassignDepartments::where('lassign_id',$request->lassign_id)->get();

        $data['department']=Departments::all();
        return  view('backend.class.department',compact('data'));
    }
}
