@extends('backend.layout')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Şube Ekleme
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
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Şube Ekle</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form action="{{route('departments.store')}}" method="post" role="form">
                    @csrf
                    <!-- text input -->

                        <div class="form-group">
                            <label>Şube Adı</label>
                            <input type="text" class="form-control" name="departments_name" required
                                   placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>Şubedeki Maksimum Öğrenci sayısı</label>
                            <input type="text" class="form-control" name="departments_number" required
                                   placeholder="Enter ...">
                        </div>

                        <div align="right" class="box-footer">
                            <button type="submit" class="btn btn-success">
                                Ekle
                            </button>
                        </div>

                    </form>
                </div>
                <!-- /.box-body -->
            </div>

        </section>
        <!-- /.content -->
    </div>
@endsection
