@extends('backend.layout')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Paket Düzenleme
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
            <!-- The Modal -->
            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Modal Heading</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Paket Adı</th>
                                    <th>Paket Kodu</th>
                                    <th>Açıklama</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody id="sortable">
                                @foreach($data['package'] as $lessonspackage)
                                    <tr id="item-{{$lessonspackage->id}}">
                                        <td hidden id="lessons_id-{{$lessonspackage->id}}">{{$lessonspackage->id}}</td>
                                        <td id="lessons_name-{{$lessonspackage->id}}">{{$lessonspackage->package_name}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="dropbtn">{{$lessonspackage->package_name}}</button>
                                                <div class="dropdown-content">
                                                    @foreach($data['packagelessons'] as $packagelessons)
                                                        @if($lessonspackage->id==$packagelessons->package_id)
                                                            @foreach($data['lessons'] as $lessons)
                                                                @if($lessons->id==$packagelessons->lessons_id)
                                                                    <a href="#">{{$lessons->lessons_name}}</a>
                                                                @endif
                                                            @endforeach

                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </td>
                                        <td id="lessons_code-{{$lessonspackage->id}}">{{$lessonspackage->package_code}}</td>
                                        <td id="lessons_content-{{$lessonspackage->id}}">{{$lessonspackage->package_content}}</td>
                                        <td><a href="javascript:void (0)"><i id="@php echo $lessonspackage->id; @endphp"
                                                                             class="fa fa-check"
                                                                             data-dismiss="modal"></i></a></td>

                                    </tr>

                                @endforeach
                                </tbody>
                            </table>

                        </div>
                        <!-- Modal body -->


                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal" id="myModal1">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Modal Heading</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <table id="example3" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Öğrenci Adı</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody id="teachers">
                                @foreach($data['student'] as $student)
                                    <tr id="item-{{$student->id}}">

                                        <td id="student-{{$student->id}}">{{$student->name}}</td>
                                        <td hidden id="student_user-{{$student->id}}">{{$student->user_id}}</td>
                                        <td><a href="javascript:void (0)"><i id="@php echo $student->id; @endphp"
                                                                             class="fa fa-check-square"
                                                                             data-dismiss="modal"></i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Modal body -->


                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Ders Ata</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form action="{{route('studentpackage.update',$data['studentpackage'] ->id)}}" method="post" role="form">
                        @csrf
                        @method('put')
                        @foreach($data['package'] as $package)
                            @if($package->id==$data['studentpackage']->package_id )
                                <div class="form-group">
                                    <input type="hidden" value="{{$package->id}}" id="lessons_id" name="lessons_id">
                                    <label>Dersin Adı</label>
                                    <input type="text" readonly value="{{$package->package_name}}" id="lessons_name"
                                           class="form-control" class="btn btn-primary"
                                           data-toggle="modal" data-target="#myModal" name="lessons_names" required
                                           placeholder="Enter ...">
                                </div>
                                <div class="form-group">
                                    <label>Dersin Açıklaması</label>
                                    <input type="text" value="{{$package->package_content}}" id="lessons_content"
                                           class="form-control" name="lessons_content" disabled
                                           placeholder="Enter ...">
                                </div>
                                <div class="form-group">
                                    <label>Dersin Kodu</label>
                                    <input type="text" value="{{$package->package_code}}" id="lessons_code"
                                           class="form-control" name="lessons_content" disabled
                                           placeholder="Enter ...">
                                </div>
                            @endif
                        @endforeach
                        @foreach($data['student'] as $student)
                            @if($student->user_id==$data['studentpackage']->student_id)
                                <div class="form-group">
                                    {{--                           Teachers İd --}}
                                    <input type="hidden" value="{{$student->user_id}}" id="teacher_id"
                                           name="student_id">
                                    <label>Öğretmenin Adı</label>
                                    <input type="text" value="{{$student->name}}" readonly class="form-control"
                                           id="student_name" class="btn btn-primary"
                                           data-toggle="modal" data-target="#myModal1" name="student_name" value=""
                                           required
                                           placeholder="Enter ...">
                                </div>
                            @endif
                        @endforeach
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">
                                Düzenle
                            </button>
                        </div>

                    </form>
                </div>
                -            <!-- /.box-body -->
            </div>

        </section>
        <!-- /.content -->
    </div>
    <script type="text/javascript">

        $(".fa-check").click(function () {
            destroy_id = $(this).attr('id');
            $("#demo1").val(destroy_id);
            //lessons
            lessons_name = "lessons_name-";
            res1 = lessons_name.concat(destroy_id);
            lessons_name = document.getElementById(res1).innerHTML;
            $("#lessons_name").val(lessons_name);

            lessons_content = "lessons_content-";
            res2 = lessons_content.concat(destroy_id);
            lessons_content = document.getElementById(res2).innerHTML;
            $("#lessons_content").val(lessons_content);

            lessons_code = "lessons_code-";
            res3 = lessons_code.concat(destroy_id);
            lessons_code = document.getElementById(res3).innerHTML;
            $("#lessons_code").val(lessons_code);


            $("#lessons_id").val(destroy_id);

        });
        $(".fa-check-square").click(function () {
            destroy_id = $(this).attr('id');
            str1 = "student-";
            res = str1.concat(destroy_id);
            satir = document.getElementById(res).innerHTML;
            $("#teachers_name").val(satir);

            str1 = "student_user-";
            res = str1.concat(destroy_id);
            satir = document.getElementById(res).innerHTML;

            $("#teacher_id").val(satir);


        });


    </script>
@endsection
