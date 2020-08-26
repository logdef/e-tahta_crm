<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Lassign;
use App\Lessons;
use App\lessonsPackageProducts;
use App\Lessonspackages;
use App\Teachers;
use Cart;
use Illuminate\Http\Request;

class LessonspackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['package']=Lessonspackages::all();
        $data['lessons']=Lessons::all();
        $data['lassign']=Lassign::all();
        $data['teacher']=Teachers::all();

        $data['packagelessons']=Lessonspackageproducts::all();

        return view('backend.lessonspackage.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.lessonspackage.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (is_int(intval($request->package_price))) {
            if (strlen($request->package_name) > 3) {
                $request->validate([
                    'package_name' => 'required|min:3',
                    'package_content' => 'required|max:30',
                    'package_price' => 'required',
                ]);
                $id = Lessonspackages::max('id') + 1;

                $st1 = substr($request->package_name, 0, 3);
                $st1 = mb_strtoupper($st1, "UTF-8");
                if ($id < 10) {
                    $kod = $st1 . "" . '00' . "" . $id;

                } elseif ($id >= 10 && $id < 100) {

                    $kod = $st1 . "" . '0' . "" . $id;

                } elseif ($id >= 100) {
                    $kod = $st1 . "". $id;

                }

                 $package_id = session('package_id');
                if (!isset($aktif_sepet_id)) {

                    $package= Lessonspackages::create([
                        'package_name' => $request->package_name,
                        'package_content' => $request->package_content,
                        'package_price' => $request->package_price,
                        'package_code' => $kod

                    ]);

                    $package_id = $package->id;

                    session()->put('package_id', $package_id);

                }
                foreach (Cart::content() as $urun) {


                    Lessonspackageproducts::updateOrCreate(
                        ['package_id' => $package_id,'lassign_id' => $urun->id],
                        [
                            'lessons_package_name' => $urun->name,
                            'lessons_package_price' => $urun->price,
                            'lessons_package_code' => $urun->options['code']
                        ]

                    );
                }
                session()->forget('package_id');
                Cart::destroy();


                if ($package) {
                    return redirect(route('lessonspackage.index'))->with('success', 'İşlem Başarılı');
                }

            } else {
                return back()->with('error', 'İşlem Başarısız..');

            }
        } else {
            return back()->with('error', 'Ücret Bilgisi Sayı olmalıdır..');
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

        $data = Lessonspackages::where('id', $id)->first();

        return view('backend.lessonspackage.edit',compact('data'));
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
        if (is_int(intval($request->package_price))) {
            if (strlen($request->package_name) > 3) {
                $request->validate([
                    'package_name' => 'required|min:3',
                    'package_content' => 'required|max:30',
                    'package_price' => 'required',
                ]);


                $package_id = session('package_id');
                if (!isset($aktif_sepet_id)) {

                    $package= Lessonspackages::where('id',$id)->update([
                        'package_name' => $request->package_name,
                        'package_content' => $request->package_content,
                        'package_price' => $request->package_price,
//                        'package_code' => $kod

                    ]);
                    $package_id = $id;

                    session()->put('package_id', $package_id);

                }

              Lessonspackageproducts::where('package_id',$id)->delete();


                foreach (Cart::content() as $urun) {


                    Lessonspackageproducts::updateOrCreate(
                        ['package_id' => $package_id,'lassign_id' => $urun->id],
                        [
                            'lessons_package_name' => $urun->name,
                            'lessons_package_price' => $urun->price,
                            'lessons_package_code' => $urun->options['code']
                        ]

                    );
                }
                session()->forget('package_id');
                Cart::destroy();


                if ($package) {
                    return redirect(route('lessonspackage.index'))->with('success', 'İşlem Başarılı');
                }

            } else {
                return back()->with('error', 'İşlem Başarısız..');

            }
        } else {
            return back()->with('error', 'Ücret Bilgisi Sayı olmalıdır..');
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
        $lessonspackages = Lessonspackages::find(intval($id));
        if ($lessonspackages->delete()){
            echo 1;
        }
        echo 0;
    }

    public function ekle (Request $request){
//    Kullanıcı giriş yaptıysa
//            if (auth()->check()){}


        if(count(Cart::content())){

            foreach (Cart::content() as $product)
            {
              if($product->id==$request->id){

                return redirect(route('product.create'))->with('success', $request->lessons_name . " " . 'Dersi Sepete Daha Önce Eklenmiş');
            }

            }
        }


        Cart::add(['id' => $request->id, 'name' => $request->lessons_name, 'product' => 1, 'qty' => 1, 'price' => $request->lessons_price, 'weight' => 550, 'options' => ['code' => $request->lessons_code,'teacher' => $request->teacher_name]]);


        return redirect(route('product.create'))->with('success', $request->lessons_name . " " . 'Dersi Sepete Eklendi');

    }

    public function guncelle (Request $request){
//    Kullanıcı giriş yaptıysa
//            if (auth()->check()){}



        if(count(Cart::content())){

            foreach (Cart::content() as $product)
            {
              if($product->id==$request->id){

                return redirect(route('product.edit',$request->page_id))->with('success', $request->lessons_name . " " . 'Dersi Sepete Daha Önce Eklenmiş');
            }

            }
        }


        Cart::add(['id' => $request->id, 'name' => $request->lessons_name, 'product' => 1, 'qty' => 1, 'price' => $request->lessons_price, 'weight' => 550, 'options' => ['code' => $request->lessons_code,'teacher' => $request->teacher_name]]);


        return redirect(route('product.edit',$request->page_id))->with('success', $request->lessons_name . " " . 'Dersi Sepete Eklendi')->with('page_id',$request->page_id);

    }

    public function productkaldir(Request $request, $rowId)
    {
        Cart::remove($rowId);
        return redirect()->route('product.edit',$request->page_id);
    }

    public function kaldir($rowId)
    {
        Cart::remove($rowId);
        return redirect()->route('product.create');
    }
}

