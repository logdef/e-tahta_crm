@extends('backend.layout')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Ders Düzenleme
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
                    <h3 class="box-title">Ders Düzenle</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form action="{{route('lesson.update',$lesson->id)}}" method="post" role="form">
                        @csrf
                            @method('put')
                        <div class="form-group col-sm-4">
                            <label>Okul</label><br>
                            <select name="school_name" id="school_name">
                                <option value="0">Seçiniz</option>
                                <optgroup label="İLK ÖĞRETİM">
                                    <option value="1" {{$lesson->school_name==1?'selected':''}}  >ilk öğretim</option>
                                </optgroup>
                                <optgroup label="ORTA ÖĞRETİM">
                                    <option value="2" {{$lesson->school_name==2?'selected':''}} >Orta Öğretim</option>
                                    <option value="3" {{$lesson->school_name==3?'selected':''}}>LGS</option>
                                </optgroup>
                                <optgroup label="LİSE">
                                    <option value="4" {{$lesson->school_name==4?'selected':''}}>Lise</option>
                                    <option value="5" {{$lesson->school_name==5?'selected':''}}>TYT</option>
                                    <option value="6" {{$lesson->school_name==6?'selected':''}}>AYT</option>
                                </optgroup>
                                <optgroup label="Sınavlar">
                                    <option value="7" {{$lesson->school_name==7?'selected':''}}>KPSS Ön Lisans</option>
                                    <option value="8" {{$lesson->school_name==8?'selected':''}}>KPSS Lisans</option>
                                    <option value="9" {{$lesson->school_name==9?'selected':''}}>DGS</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Okul Sınıfı</label><br>
                            <select name="school_year" id="school_year">

                                <option value="0">Seçiniz</option>
                                <optgroup label="Okul Sınıfı">
                                    <option value="1" {{$lesson->school_year==1?'selected':''}}>1.Sınıf</option>
                                    <option value="2" {{$lesson->school_year==2?'selected':''}}>2.Sınıf</option>
                                    <option value="3" {{$lesson->school_year==3?'selected':''}}>3.Sınıf</option>
                                    <option value="4" {{$lesson->school_year==4?'selected':''}}>4.Sınıf</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Dersin Dönemi</label><br>
                            <select name="school_period" id="school_period">

                                <option value="0">Seçiniz</option>
                                <optgroup label="Dersin Dönemi">
                                    <option value="1" {{$lesson->school_period==1?'selected':''}}>1.Dönem</option>
                                    <option value="2" {{$lesson->school_period==2?'selected':''}}>2.Dönem</option>
                                </optgroup>
                            </select>
                        </div>
                        <!-- text input -->
                        <div class="form-group">
                            <label>Dersin Adı</label>
                            <input type="text" class="form-control" name="lessons_name" required value="{{$lesson->lessons_name}}">
                        </div>
                        <div class="form-group">
                            <label>Dersin Açıklaması</label>
                            <input type="text" class="form-control" name="lessons_content" required value="{{$lesson->lessons_content}}">
                        </div>
                            <div class="form-group">
                                <label>Dersin Ücreti</label>
                                <input type="text" class="form-control" name="lessons_price" required value="{{$lesson->lessons_price}}">
                            </div>
                            <div class="form-group">
                                <label>Dersin Süresi</label>
                                <input type="text" class="form-control" name="lessons_time" required value="{{$lesson->lessons_time}}"
                                       placeholder="Enter ...">
                            </div>
                        <div align="right" class="box-footer">
                            <button type="submit" class="btn btn-success">
                                Düzenle
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
