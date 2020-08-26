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
                        <div class="box-header">
                            <h3 class="box-title">Öğrenciye Ders Atama</h3>
                            <div align="right">
                                <a href="{{route('studentlessons.create')}}">
                                    <button class="btn btn-success">Ekle</button>
                                </a>
                            </div>
                        </div>
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Öğrenci Adı</th>
                                    <th>Öğretmenin Adı</th>
                                    <th>Dersin Adı</th>
                                    <th>Dersin Kodu</th>
                                    <th>Açıklama</th>
                                    <th>Şube</th>
                                    <th>Durum</th>
                                    <th>Baçlama Tarihi</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data['studentlessons'] as $studentlessons)
                                    <tr id="item-{{$studentlessons->id}}">
                                        @foreach($data['student'] as $student)
                                            @if($studentlessons->student_id==$student->user_id)
                                                <td>{{$student->name}}</td>
                                            @endif
                                        @endforeach
                                        @foreach($data['lassigndepartment'] as $lassigndepartment)
                                            @if($lassigndepartment->id==$studentlessons->lassigndepartmen_id )
                                                    @foreach($data['lassign'] as $lassign)
                                                        @if($lassigndepartment->lassign_id==$lassign->id)
                                                            @foreach($data['teacher'] as $teacher)
                                                                @if($teacher->user_id==$lassign->users_id)
                                                                    <td>{{$teacher->name}}</td>
                                                                @endif
                                                            @endforeach
                                                            @foreach($data['lessons'] as $lessons)
                                                                @if($lessons->id==$lassign->lessons_id )
                                                                    <td>{{$lessons->lessons_name}}</td>
                                                                    <td>{{$lessons->lessons_code}}</td>
                                                                    <td>{{$lessons->lessons_content}}</td>
                                                                @endif
                                                            @endforeach
                                                                @foreach($data['department'] as $department)
                                                                    @if($department->id==$lassigndepartment->department_id )
                                                                        <td>{{$department->departments_name}}</td>
                                                                    @endif
                                                                @endforeach
                                                        @endif


                                                    @endforeach

                                                @endif


                                        @endforeach


                                        <td>{{$studentlessons->student_status==0?"Pasif":"Aktif"}}</td>
                                            <td>{{$studentlessons->start_time}}</td>
                                        <td><a href="{{route('studentlessons.edit',$studentlessons->id)}}"><i
                                                    class="fa fa-pencil-square"></i></a></td>
                                        <td><a href="javascript:void (0)"><i id="@php echo $studentlessons->id; @endphp"
                                                                             class="fa fa-trash-o"></i></a></td>
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
                        url: "studentlessons/" + destroy_id,
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
