<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Lassign;
use App\Lessonspackageproducts;
use App\Lessonspackages;
use App\Teachers;
use Illuminate\Http\Request;
use App\Lessons;
use Cart;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;

class LessonsbasketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data['lessons'] = Lessons::all();
        $data['lassign'] = Lassign::all();
        $data['teacher'] = Teachers::all();
        return view('backend.lessonspackage.product', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data['lassign'] = Lassign::all();
        $data['teacher'] = Teachers::all();
        $data['packageproducts'] = Lessonspackageproducts::where('package_id', $id)->get();
        $data['packages'] = Lessonspackages::where('id', $id)->first();
        $page_id=$data['packages']->id;

        return view('backend.lessonspackage.productedit', compact('data'))->with('page_id',$page_id);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
