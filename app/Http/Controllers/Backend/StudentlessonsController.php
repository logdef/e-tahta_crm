<?php

namespace App\Http\Controllers\Backend;

use App\Departments;
use App\Http\Controllers\Controller;
use App\Lassign;
use App\LassignDepartments;
use App\Lessons;
use App\Payments;
use App\StudentLessons;
use App\Students;
use App\Teachers;
use Illuminate\Http\Request;

class StudentlessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['lessons'] = Lessons::all();
        $data['student'] = Students::all();
        $data['teacher'] = Teachers::all();
        $data['lassign'] = Lassign::all();
        $data['lassigndepartment'] = LassignDepartments::all();
        $data['department'] = Departments::all();
        $data['studentlessons'] = StudentLessons::all();

        return view('backend.studentlessons.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['lessons'] = Lessons::all();
        $data['student'] = Students::all();
        $data['teacher'] = Teachers::all();
        $data['lassign'] = Lassign::all();
        $data['lassigndepartment'] = LassignDepartments::all();
        $data['department'] = Departments::all();


        return view('backend.studentlessons.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->teacher_name == null && !$request->student_name == null) {


            $var = StudentLessons::where('student_id', $request->student_id)->where('lassigndepartmen_id', $request->lassign_id)->first();

            if (!isset($var)) {
                $student = StudentLessons::insert([
                    'student_id' => $request->student_id,
                    'lassigndepartmen_id' => $request->lassign_id,
                    'start_time' => date('Y-m-d'),
                ]);

                $lassigndep = LassignDepartments::where('id', $request->lassign_id)->first();
                $lassign = Lassign::where('id', $lassigndep->lassign_id)->first();
                $lessons = Lessons::where('id', $lassign->lessons_id)->first();


                $payment = Payments::where('user_id', $request->student_id)->first();


                if (isset($payment)) {

                    $toplam = $payment->student_debt + $lessons->lessons_price;

                    Payments::where('user_id', $request->student_id)->update([
                        'student_debt' => $toplam,
                    ]);

                } else {
                    Payments::insert([
                        'user_id' => $request->student_id,
                        'student_debt' => $lessons->lessons_price,


                    ]);


                }


                if ($student) {

                    return redirect(route('studentlessons.index'))->with('success', 'İşlem Başarılı');
                } else {
                    return back()->with('error', 'İşlem Başarısız..');
                }
            } else {

                return back()->with('error', 'Ders daha önce eklenmiştir..');
            }

        } else {
            return back()->with('error', 'Öğrenci ve Ders  seçimi yapmalısınız..');

        }


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data['lessons'] = Lessons::all();
        $data['student'] = Students::all();
        $data['teacher'] = Teachers::all();
        $data['lassign'] = Lassign::all();
        $data['lassigndepartment'] = LassignDepartments::all();
        $data['department'] = Departments::all();


        $data['studentlessons'] = StudentLessons::where('id', $id)->first();

        return view('backend.studentlessons.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$request->teacher_name == null && !$request->students_name == null) {
            $studentles = StudentLessons::where('id', $id)->first();
            $lassigndepl = LassignDepartments::where('id', $studentles->lassigndepartmen_id)->first();
            $lassignl = Lassign::where('id', $lassigndepl->lassign_id)->first();
            $lessonsl = Lessons::where('id', $lassignl->lessons_id)->first();


            $var = StudentLessons::where('student_id', $request->student_id)->where('lassigndepartmen_id', $request->lassign_id)->first();
            if (!isset($var)) {
                $student = StudentLessons::where('id', $id)->update([
                    'lassigndepartmen_id' => $request->lassign_id
                ]);

                $lassigndep = LassignDepartments::where('id', $request->lassign_id)->first();
                $lassign = Lassign::where('id', $lassigndep->lassign_id)->first();
                $lessons = Lessons::where('id', $lassign->lessons_id)->first();

                $payment = Payments::where('user_id', $request->student_id)->first();

                $toplam = $payment->student_debt + $lessons->lessons_price - $lessonsl->lessons_price;

                Payments::where('user_id', $request->student_id)->update([

                    'student_debt' => $toplam,
                ]);


                if ($student) {

                    return redirect(route('studentlessons.index'))->with('success', 'İşlem Başarılı');
                } else {
                    return back()->with('error', 'İşlem Başarısız..');
                }
            } else {

                return back()->with('error', 'Ders daha önce eklenmiştir..');
            }

        } else {
            return back()->with('error', 'Öğrenci ve Ders  seçimi yapmalısınız..');

        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studentlessons = StudentLessons::find(intval($id));
        if ($studentlessons->delete()) {
            echo 1;
        }
        echo 0;
    }
}
