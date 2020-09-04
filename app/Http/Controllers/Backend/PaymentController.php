<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lassign;
use App\LassignDepartments;
use App\Lessons;
use App\Lessonspackageproducts;
use App\Lessonspackages;
use App\StudentLessons;
use App\StudentPackages;
use App\Students;
use App\Teachers;
use App\Payments;
use App\Paying;
class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['lessons']=Lessons::all();
        $data['lessons']=Lessons::all();
        $data['lassign']=Lassign::all();
        $data['teacher']=Teachers::all();
        $data['studentlessons'] = StudentLessons::all();
        $data['student']=Students::all();
        $data['package']=Lessonspackages::all();
        $data['lassigndepartment']=LassignDepartments::all();
        $data['payments']=Payments::all();
        $data['paying']=Paying::all();
        return view('backend.pay.index',compact('data'));
        
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
     $paying=Paying::insert([
         'user_id'=>$request->user_id,
            'student_paying'=>$request->student_paying,
            'pay_type'=>$request->gender
        ]);

        
        $payment = Payments::where('user_id', $request->user_id)->first();

       
        if (isset($payment)) {

            $toplam = $payment->student_paid+$request->student_paying;
            $kalan= $payment->student_debt-$toplam;

            Payments::where('user_id', $request->user_id)->update([
                'student_paid' => $toplam,
                'current_debt'=> $kalan
            ]);

        } else {
            Payments::insert([
                'user_id' => $request->student_id,
                'student_debt' => $request->student_debt,


            ]);


        }  
         if ($payment) {

             return redirect(route('odemetablo.index'))->with('success', 'İşlem Başarılı');
         } else {
             return back()->with('error', 'İşlem Başarısız..');
         }
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
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
        $data['lessons']=Lessons::all();
        $data['lassign']=Lassign::all();
        $data['teacher']=Teachers::all();
        $data['studentlessons'] = StudentLessons::all();
        
        $data['package']=Lessonspackages::all();
        $data['lassigndepartment']=LassignDepartments::all();
        $data['payments']=Payments::where('id',$id)->first();

        $data['s']=Students::where('user_id',$data['payments']->user_id)->first();
        $data['student']=Students::all();

        $data['paying']=Paying::where('user_id',$data['payments']->user_id)->get();

        return view('backend.pay.edit',compact('data'));
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
        $payment = Payments::where('user_id', $request->user_id)->first();

        $toplam = $payment->student_paid + $request->student_payings;
        $kalan= $payment->student_debt-$toplam;

        Payments::where('user_id', $request->student_id)->update([

            'student_paid' => $toplam,
            'current_debt' => $kalan 
        ]);


        if ($payment) {

            return redirect(route('odemetablo.index'))->with('success', 'İşlem Başarılı');
        } else {
            return back()->with('error', 'İşlem Başarısız..');
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
        $payments = Payments::find(intval($id));
        if ($payments->delete()) {
            echo 1;
        }
        echo 0;
    
    }
      


  
   public function list(Request $request){
    $payments=new Payments;
    $payments = Payments::find($id);
    $payments->delete($id);

    $data['payments']  = Payments::where('user_id', $request->user_id)->get();
    return view('backend.pay.index',compact('data'));
  }

 
 
   
}
