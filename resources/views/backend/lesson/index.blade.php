@extends('backend.layout')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dersler Tablosu
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Ana Sayfa</a></li>
                <li><a href="#">Tablolar</a></li>
                <li class="active">Dersler Tablosu</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Dersler Tablosu</h3>
                           <div>
{{--                               <div class="form-group col-sm-8">--}}
{{--                                   <label>Okul</label><br>--}}
{{--                                   <select name="school_name" id="school_name">--}}
{{--                                       <option value="0">Seçiniz</option>--}}
{{--                                       <optgroup label="İLK ÖĞRETİM">--}}
{{--                                           <option value="1">ilk öğretim</option>--}}
{{--                                       </optgroup>--}}
{{--                                       <optgroup label="ORTA ÖĞRETİM">--}}
{{--                                           <option value="2">Orta Öğretim</option>--}}
{{--                                           <option value="3">LGS</option>--}}
{{--                                       </optgroup>--}}
{{--                                       <optgroup label="LİSE">--}}
{{--                                           <option value="4">Lise</option>--}}
{{--                                           <option value="5">TYT</option>--}}
{{--                                           <option value="6">AYT</option>--}}
{{--                                       </optgroup>--}}
{{--                                       <optgroup label="Sınavlar">--}}
{{--                                           <option value="7">KPSS Ön Lisans</option>--}}
{{--                                           <option value="8">KPSS Lisans</option>--}}
{{--                                           <option value="9">DGS</option>--}}
{{--                                       </optgroup>--}}
{{--                                   </select>--}}
{{--                               </div>--}}
                               <div class="form-group" align="right">
                                   <a href="{{route('lesson.create')}}">
                                       <button class="btn btn-success">Ekle</button>
                                   </a>
                               </div>
                           </div>
                        </div>
                        <!-- /.box-header -->


                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Okul Bölümü</th>
                                    <th>Dersin Adı</th>
                                    <th>Dersin Kodu</th>
                                    <th>Açıklama</th>
                                    <th>Ders Süresi</th>
                                    <th>Ücret</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody id="sortable">
                                @foreach($data['lessons'] as $lessons)
                                    <tr id="item-{{$lessons->id}}">
                                        @foreach($data['schools'] as $schools)
                                            @if($lessons->school_name==$schools->schools_must)
                                                <td>{{$schools->schools_name}}</td>

                                            @endif

                                        @endforeach


                                        <td>{{$lessons->lessons_name}}</td>
                                        <td>{{$lessons->lessons_code}}</td>
                                        <td>{{$lessons->lessons_content}}</td>
                                        <td>{{$lessons->lessons_time}}</td>
                                        <td>{{$lessons->lessons_price}}</td>
                                        <td><a href="{{route('lesson.edit',$lessons->id)}}"><i
                                                    class="fa fa-pencil-square"></i></a></td>
                                        <td><a href="javascript:void (0)"><i id="@php echo $lessons->id; @endphp"
                                                                             class="fa fa-trash-o"></i></a></td>
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
                        url: "lesson/" + destroy_id,
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
