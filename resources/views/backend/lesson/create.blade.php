@extends('backend.layout')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Ders Ekleme
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
                    <h3 class="box-title">Ders Ekle</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form action="{{route('lesson.store')}}" method="post" role="form">
                    @csrf
                    <!-- text input -->

                        <div class="form-group col-sm-4">
                            <label>Okul</label><br>
                            <select name="school_name" id="school_name">
                                <option value="0">Seçiniz</option>
                                <optgroup label="İLK ÖĞRETİM">
                                    <option value="1">ilk öğretim</option>
                                </optgroup>
                                <optgroup label="ORTA ÖĞRETİM">
                                    <option value="2">Orta Öğretim</option>
                                    <option value="3">LGS</option>
                                </optgroup>
                                <optgroup label="LİSE">
                                    <option value="4">Lise</option>
                                    <option value="5">TYT</option>
                                    <option value="6">AYT</option>
                                </optgroup>
                                <optgroup label="Sınavlar">
                                    <option value="7">KPSS Ön Lisans</option>
                                    <option value="8">KPSS Lisans</option>
                                    <option value="9">DGS</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Okul Sınıfı</label><br>
                            <select name="school_year" id="school_year">

                                <option value="0">Seçiniz</option>
                                <optgroup label="Okul Sınıfı">
                                    <option value="1">1.Sınıf</option>
                                    <option value="2">2.Sınıf</option>
                                    <option value="3">3.Sınıf</option>
                                    <option value="4">4.Sınıf</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Dersin Dönemi</label><br>
                            <select name="school_period" id="school_period">

                                <option value="0">Seçiniz</option>
                                <optgroup label="Dersin Dönemi">
                                    <option value="1">1.Dönem</option>
                                    <option value="2">2.Dönem</option>
                                </optgroup>
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Dersin Adı</label>
                            <input type="text" class="form-control" name="lessons_name" required
                                   placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>Dersin Açıklaması</label>
                            <input type="text" class="form-control" name="lessons_content" required
                                   placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>Dersin Ücreti</label>
                            <input type="text" class="form-control"   name="lessons_price" required
                                   placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>Dersin Süresi</label>
                            <input type="text"  class="form-control" name="lessons_time" required
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
