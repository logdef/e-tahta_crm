@extends('backend.layout')

@section('content')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Page Header
                <small>Optional description</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <!--------------------------
              | Your Page Content Here |
              -------------------------->
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Hover Data Table</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Öğretmen Adı</th>
                                    <th>Dersin Adı</th>
                                    <th>Dersin Kodu</th>
                                    <th>Açıklama</th>
                                    <th>Ücret</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody id="sortable">
                                @foreach($data['lassign'] as $lassign)
                                    <tr id="item-{{$lassign->id}}">
                                        <form action="{{route('lessonspackage.ekle')}}" method="post">
                                        @foreach($data['teacher'] as $teacher)
                                            @if($lassign->users_id==$teacher->user_id)
                                                <td>{{$teacher->name}}</td>
                                                <td hidden><input type="hidden" name="teacher_name" value="{{$teacher->name}}"></td>
                                            @endif

                                        @endforeach

                                            @foreach($data['lessons'] as $lessons)
                                            @if($lassign->lessons_id==$lessons->id)

                                                <td>{{$lessons->lessons_name}}</td>
                                                    <td hidden><input type="hidden" name="lessons_name" value="{{$lessons->lessons_name}}"></td>
                                                <td>{{$lessons->lessons_code}}</td>
                                                    <td hidden><input type="hidden" name="lessons_code" value="{{$lessons->lessons_code}}"></td>
                                                <td>{{$lessons->lessons_content}}</td>
                                                <td>{{$lessons->lessons_price}}</td>
                                                    <td hidden><input type="hidden" name="lessons_price" value="{{$lessons->lessons_price}}"></td>
                                            @endif
                                        @endforeach
                                        <td>
                                                @csrf
                                                <input type="hidden" name="id" id="id" value="{{$lassign->id}}">
                                                <input type="submit" class="btn btn-success" value="Sepete Ekle">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="box-body">
                            @if(count(Cart::content()))
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Öğretmen Adı</th>
                                        <th>Dersin Adı</th>
                                        <th>Dersin Kodu</th>
                                        <th>Ücret</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody id="sortable">
                                    @foreach(Cart::content() as $urun)
                                        <tr>
                                            <td>{{$urun->options->teacher}}</td>
                                            <td>{{$urun->name}}</td>
                                            <td>{{$urun->options->code}}</td>
                                            <td>{{$urun->price}}</td>
                                            <td>
                                                <form action="{{route('lessonspackage.kaldir',$urun->rowId)}}"
                                                      method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    {{--                                                    <input type="hidden" name="id" value="{{$urun->rowId}}">--}}
                                                    <input type="submit" class="btn btn-danger" value="Dersi Sil">

                                                </form>
                                            </td>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>Sepette Ürün Bulunmamaktadır</p>
                            @endif


                        </div>
                    @if(count(Cart::content()))
                        <!-- /.box-body -->
                            <div class="box-body">
                                <div align="right">
                                    <a href="{{route('lessonspackage.create')}}">
                                        <button class="btn btn-success">Paket Ekle</button>
                                    </a>
                                </div>
                            </div>
                    </div>
                    @else
                        <div class="box-body">
                            <div align="right">
                                <a href="">
                                    <button disabled class="btn btn-success">Paket Ekle</button>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>


            </div>
            <!-- /.col -->


        </section>
        <!-- /.content -->
    </div>


@endsection
