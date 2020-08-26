@extends('backend.layout')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Data Tables
                <small>advanced tables</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">Data tables</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                                <form action="{{route('lassign.create')}}">
                                    <div class="form-group col-sm-5">
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
                                    <div class="form-group col-sm-5">
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
                                    <div class="form-group col-sm-2">
                                        <button type="submit" class="btn btn-success">Ekle</button>
                                    </div>
                                </form>

                        </div>
                        <div class="box-body">
                            <h3 class="box-title">Ders Öğretmen Tablosu</h3>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Dersin Adı</th>
                                    <th>Dersin Kodu</th>
                                    <th>Açıklama</th>
                                    <th>Öğretmen</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data['lassign'] as $lassign)
                                    <tr id="item-{{$lassign->id}}">
                                        @foreach($data['lessons'] as $lessons)
                                            @if($lassign->lessons_id==$lessons->id)
                                                <td>{{$lessons->lessons_name}}</td>
                                                <td>{{$lessons->lessons_code}}</td>
                                                <td>{{$lessons->lessons_content}}</td>
                                            @endif
                                        @endforeach
                                        @foreach($data['teacher'] as $teacher)
                                            @if($lassign->users_id==$teacher->user_id)
                                                <td>{{$teacher->name}}</td>
                                            @endif
                                        @endforeach

                                        <td><a href="{{route('lassign.edit',$lassign->id)}}"><i
                                                    class="fa fa-pencil-square"></i></a></td>
                                        <td><a href="javascript:void (0)"><i id="@php echo $lassign->id; @endphp" class="fa fa-trash-o"></i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>

    <script type="text/javascript">

        $(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        });


        $(".fa-trash-o").click(function () {
            destroy_id = $(this).attr('id');

            alertify.confirm('Silme işlemini onaylayın!', 'Bu işlem geri alınamaz',
                function () {


                    $.ajax({
                        type: "DELETE",
                        url: "lassign/" + destroy_id,
                        success: function (msg) {
                            if (msg) {
                                $("#item-" + destroy_id).remove();
                                alertify.success('Silme işlemi Başarılı...')

                            } else {
                                alertify.error('Silme işlemi Başarısız..')

                            }

                        }
                    });
                },
                function () {
                    alertify.error('Silme işlemi iptal edildi')
                }
            )

        });


    </script>

@endsection
