@extends('backend.layout')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Ödeme Tablosu
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
                    <h3 class="box-title">Ücret</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form action="{{route('lesson.store')}}" method="post" role="form">
                    @csrf
                    <!-- text input -->

                      

                        <div class="form-group">
                            <label>Öğrenci Ad Soyad</label>
                            <input type="text" class="form-control" name="lessons_name" required
                                   placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>Öğrenci Okul No</label>
                            <input type="text" class="form-control" name="lessons_content" required
                                   placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>Öğrenci Bölüm</label>
                            <input type="text" class="form-control"   name="lessons_price" required
                                   placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>Aldığı Dersler</label>
                            <input type="text"  class="form-control" name="lessons_time" required
                                   placeholder="Enter ...">

                                   <div class="form-group">
                            <label>Ücret</label>
                            <input type="text"  class="form-control" name="lessons_time" required
                                   placeholder=".....TL">
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
