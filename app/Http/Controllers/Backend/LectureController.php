<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Lessons;
use App\Schools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $data['lessons'] = Lessons::all();
        $data['schools'] = Schools::all();

        return view('backend.lesson.index', compact('data'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.lesson.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (!$request->school_name == 0 && !$request->school_year == 0 && !$request->school_period == 0) {

            if (is_int(intval($request->lessons_price)) && is_int(intval($request->lessons_time))) {
                if (strlen($request->lessons_name) > 3) {
                    $request->validate([
                        'lessons_name' => 'required|min:3',
                        'lessons_content' => 'required|max:30',
                        'lessons_price' => 'required',
                    ]);
                    $st1 = substr($request->lessons_name, 0, 3);
                    $st1 = mb_strtoupper($st1, "UTF-8");
                    $schools_code=Schools::all();
                    foreach ($schools_code as $key){

                        if($request->school_name == $key->schools_must){
                            $st1=$key->schools_code.''.$st1;
                        }

                    }
                    $st1=$st1.''.$request->school_year.''.'0'.''.$request->school_period;




                    $lesson = Lessons::insert([
                        'lessons_name' => $request->lessons_name,
                        'lessons_code' => $st1,
                        'lessons_content' => $request->lessons_content,
                        'lessons_price' => $request->lessons_price,
                        'school_name' => $request->school_name,
                        'school_year' => $request->school_year,
                        'school_period' => $request->school_period,
                        'lessons_time' => $request->lessons_time,
                    ]);

                    if ($lesson) {
                        return redirect(route('lesson.index'))->with('success', 'İşlem Başarılı');
                    }

                } else {
                    return back()->with('error', 'İşlem Başarısız..');

                }
            } else {
                return back()->with('error', 'Ücret Bilgisi ve Ders Süresi Sayı olmalıdır..');
            }


        } else {
            return back()->with('error', 'Okul,Okul Sınıfı ve Dersin Dönemi alanlarını kontrol ediniz ..');

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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lesson = Lessons::where('id', $id)->first();
        return view('backend.lesson.edit')->with('lesson', $lesson);
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
        if (is_int(intval($request->lessons_price))) {
            $lesson = Lessons::where('id', $id)->update([
                'lessons_name' => $request->lessons_name,
                'lessons_content' => $request->lessons_content,
                'lessons_price' => $request->lessons_price,
                'lessons_time' => $request->lessons_time,
                'school_name' => $request->school_name,
                'school_year' => $request->school_year,
                'school_period' => $request->school_period,
                'lessons_time' => $request->lessons_time,


            ]);

            if ($lesson) {
                return redirect(route('lesson.index'))->with('success', 'İşlem Başarılı');
            }
            return back()->with('error', 'İşlem Başarısız..');
        } else {
            return back()->with('error', 'Ücret Bilgisi Sayı olmalıdır..');
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
        $lessons = Lessons::find(intval($id));
        if ($lessons->delete()) {
            echo 1;
        }
        echo 0;
    }

    public function report(){

        return DB::table('lassigns as las')
            ->selectRaw('les.lessons_name, COUNT(*) as Total')
            ->join('lessons as les','les.id','=','las.lessons_id')
            ->join('teachers as tec','tec.user_id','=','las.users_id')
            ->groupBy('les.lessons_name')
            ->orderByRaw('COUNT(*) DESC')
            ->get();


    }
}
