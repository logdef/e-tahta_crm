<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\StudentLessons;
use App\Students;
use App\Lassign;
use App\Lessons;
use App\lessonsPackageProducts;
use App\Lessonspackages;
use App\Teachers;
use App\LassignDepartments;
use App\Departments;
use App\StudentPackages;

class OdemeController extends Controller
{
    public function index(){
        $data['package']=Lessonspackages::all();
        $data['lessons'] = Lessons::all();
        $data['student'] = Students::all();
        $data['teacher'] = Teachers::all();
        $data['lassign'] = Lassign::all();
        $data['lassigndepartment'] =LassignDepartments::all();
        $data['department'] =Departments::all();
        $data['studentlessons'] = StudentLessons::all(); 
        $data['studentlessons'] = StudentLessons::all();
        $data['studentpackage'] = StudentPackages::all();
        $data['packagelessons']=Lessonspackageproducts::all();

        return view('backend.pay.index',compact('data'));
        
      
        
      
    }
    public function calculate($lessons_price,$student_id){
        $student_id->$lessons_price;        
        
    }

    public function create()
    {
        return view('backend.pay.create');
    }

    public function edit($id)
    {
        $data['students']=Students::all();
       
        return view('backend.pay.edit',compact('data'));
    }

}
