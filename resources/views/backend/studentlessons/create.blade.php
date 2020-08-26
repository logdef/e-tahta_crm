@extends('backend.layout')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Öğrenci Atama
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
                                    <th>Öğretmen Adı</th>
                                    <th>Dersin Adı</th>
                                    <th>Dersin Kodu</th>
                                    <th>Açıklama</th>
                                    <th>Şube</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody id="sortable">
                                @foreach($data['lassigndepartment'] as $lassigndepartment)
                                    <tr id="item-{{$lassigndepartment->id}}">
                                        <td hidden
                                            id="lassign_id-{{$lassigndepartment->id}}">{{$lassigndepartment->id}}</td>
                                        @foreach($data['lassign'] as $lassign)
                                            @if($lassign->id==$lassigndepartment->lassign_id)
                                                @foreach($data['teacher'] as $teacher)
                                                    @if($teacher->user_id==$lassign->users_id)
                                                        <td id="teacher_name-{{$lassigndepartment->id}}">{{$teacher->name}}</td>
                                                    @endif
                                                @endforeach
                                                @foreach($data['lessons'] as $lessons)
                                                    @if($lessons->id==$lassign->lessons_id)
                                                        <td id="lessons_name-{{$lassigndepartment->id}}">{{$lessons->lessons_name}}</td>
                                                        <td id="lessons_code-{{$lassigndepartment->id}}">{{$lessons->lessons_code}}</td>
                                                        <td id="lessons_content-{{$lassigndepartment->id}}">{{$lessons->lessons_content}}</td>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                        @foreach($data['department'] as $department)
                                            @if($department->id==$lassigndepartment->department_id)
                                                <td id="department-{{$lassigndepartment->id}}">{{$department->departments_name}}</td>
                                            @endif
                                        @endforeach
                                        <td><a href="javascript:void (0)"><i
                                                    id="@php echo $lassigndepartment->id; @endphp"
                                                    class="fa fa-check"
                                                    data-dismiss="modal"></i></a></td>
                                        @endforeach
                                    </tr>
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
                    <h3 class="box-title">Öğrenci
                        <Atama></Atama>
                    </h3>
                </div>
                <!-- /.box-header -->

                <div class="box-body">

                    <form action="{{route('studentlessons.store')}}" method="post" role="form">
                        @csrf

                        <div class="form-group">
                            <input type="hidden" id="lassign_id" name="lassign_id">
                            <label>Öğretmenin Adı</label>
                            <input type="text" readonly id="teacher_name" class="form-control" class="btn btn-primary"
                                   data-toggle="modal" data-target="#myModal" name="teacher_name" required
                                   placeholder="Enter ...">
                        </div>
                        <div class="form-group">

                            <label>Dersin Adı</label>
                            <input type="text" readonly id="lessons_name" class="form-control" class="btn btn-primary" disabled
                                    name="lessons_name" required
                                   placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>Dersin Kodu</label>
                            <input type="text" id="lessons_code" class="form-control" name="lessons_code" disabled
                                   placeholder="Enter ...">
                        </div>

                        <div class="form-group">
                            <label>Dersin Açıklaması</label>
                            <input type="text" id="lessons_content" class="form-control" name="lessons_content" disabled
                                   placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>Şube </label>
                            <input type="text" id="department" class="form-control" name="department" disabled
                                   placeholder="Enter ...">
                        </div>


                        <div class="form-group">
                            {{--                           Student İd --}}
                            <input type="hidden" id="student_id" name="student_id">
                            <label>Öğrencinin Adı</label>
                            <input type="text" readonly class="form-control" id="students_name" class="btn btn-primary"
                                   data-toggle="modal" data-target="#myModal1" name="student_name" required
                                   placeholder="Enter ...">
                        </div>
                        <div class="form-group">
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
    <script type="text/javascript">

        $(".fa-check").click(function () {
            destroy_id = $(this).attr('id');
            $("#demo1").val(destroy_id);
            //lessons
            teacher_name = "teacher_name-";
            res1 = teacher_name.concat(destroy_id);
            teacher_name = document.getElementById(res1).innerHTML;
            $("#teacher_name").val(teacher_name);

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

            department = "department-";
            res3 = department.concat(destroy_id);
            department = document.getElementById(res3).innerHTML;
            $("#department").val(department);


            $("#lassign_id").val(destroy_id);


        });
        $(".fa-check-square").click(function () {
            destroy_id = $(this).attr('id');
            str1 = "student-";
            res = str1.concat(destroy_id);
            satir = document.getElementById(res).innerHTML;
            $("#students_name").val(satir);

            str1 = "student_user-";
            res2 = str1.concat(destroy_id);
            student_user = document.getElementById(res2).innerHTML;
            $("#student_id").val(student_user);


        });


    </script>
@endsection
