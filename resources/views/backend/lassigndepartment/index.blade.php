@extends('backend.layout')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Şube ve Dersler
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">Şube ve Dersler</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Derslere Atanmış sınıflar</h3>
                            <div align="right">
                                <a href="{{route('lassigndepartment.create')}}">
                                    <button class="btn btn-success">Ekle</button>
                                </a>
                            </div>
                        </div>
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Dersin Hocası</th>
                                    <th>Okul Adı</th>
                                    <th>Dersin Adı</th>
                                    <th>Dersin Kodu</th>
                                    <th>Açıklama</th>
                                    <th>Şube Adı</th>
                                    <th>Şube Öğrenci Sayısı</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data['lassigndepartmen'] as $ldepartment)
                                    <tr id="item-{{$ldepartment->id}}">
                                        @foreach($data['lassign'] as $lassign)

                                            @if($ldepartment->lassign_id==$lassign->id)
                                                @foreach($data['teacher'] as $teacher)
                                                    @if($teacher->user_id==$lassign->users_id)

                                                        <td>{{$teacher->name}}</td>

                                                    @endif
                                                @endforeach
                                                @foreach($data['lessons'] as $lessons)
                                                    @if($lessons->id==$lassign->lessons_id)


                                                        @foreach($data['school'] as $school)
                                                            @if($school->id==$lessons->school_name)
                                                                <td>{{$school->schools_name}} </td>
                                                            @endif
                                                        @endforeach
                                                        <td>{{$lessons->lessons_name}}</td>
                                                        <td>{{$lessons->lessons_code}}</td>
                                                        <td>{{$lessons->lessons_content}}</td>

                                                    @endif

                                                @endforeach


                                            @endif
                                        @endforeach
                                        @foreach($data['department'] as $department)
                                            @if($ldepartment->department_id ==$department->id)
                                                <td>{{$department->departments_name}}</td>
                                                <td>{{$department->departments_number}}</td>

                                        @if($department->departments_status)
                                        <td><a href="{{route('lassigndepartment.edit',$ldepartment->id)}}"><i
                                                    class="fa fa-pencil-square"></i></a></td>
                                        <td><a href="javascript:void (0)"><i id="@php echo $ldepartment->id; @endphp"
                                                                             class="fa fa-trash-o"></i></a></td>
                                                    @else
                                            <td></td>
                                            <td></td>

                                                    @endif
                                                @endif
                                            @endforeach
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
                        url: "lassigndepartment/" + destroy_id,
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
