
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
                            <form action="{{route('lessonspackage.update',$data->id)}}" method="post" role="form">
                            @csrf
                                @method('put')
                            <!-- text input -->
                                <div class="form-group">
                                    <label>Paketin Adı</label>
                                    <input type="text" class="form-control" name="package_name" value="{{$data->package_name}}" required placeholder="Enter ...">
                                </div>
                                <div class="form-group">
                                    <label>Paketin Açıklaması</label>
                                    <input type="text" class="form-control" name="package_content" value="{{$data->package_content}}" required placeholder="Enter ...">
                                </div>
                                <div class="form-group">
                                    <label>Paket Ücreti</label>
                                    <input type="text" class="form-control" name="package_price"  value="{{$data->package_price}}" required placeholder="Enter ...">
                                </div>


                                @if(count(Cart::content()))
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>Öğretmen Adı</th>
                                            <th>Dersin Adı</th>
                                            <th>Dersin Kodu</th>
                                            <th>Ücret</th>
                                        </tr>
                                        </thead>
                                        <tbody id="sortable">
                                        @foreach(Cart::content() as $urun)
                                            <tr >
                                                <td>{{$urun->options->teacher}}</td>
                                                <td>{{$urun->name}}</td>
                                                <td>{{$urun->options->code}}</td>
                                                <td>{{$urun->price}}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <th colspan="3" class="text-right">Alt Toplam</th>
                                            <th>{{Cart::subtotal()}}</th>
                                        </tr>
                                        </tbody>
                                    </table>
                                @else
                                    <p>Sepette Ürün Bulunmamaktadır</p>
                                @endif
                                <div align="right" >
                                    <button type="submit" class="btn btn-success">
                                        Düzenle
                                    </button>
                                </div>

                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>

                </div>
                <!-- /.col -->
            </div>



        </section>
        <!-- /.content -->
    </div>


@endsection
