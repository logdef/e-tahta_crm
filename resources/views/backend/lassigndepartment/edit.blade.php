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
                                    <th>Dersin Öğretmeni</th>
                                    <th>Dersin Adı</th>
                                    <th>Dersin Kodu</th>
                                    <th>Açıklama</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody id="sortable">
                                @foreach($data['lassign'] as $lassign)
                                    <tr id="item-{{$lassign->id}}">
                                        @foreach($data['teacher'] as $teacher)
                                            @if($teacher->user_id==$lassign->users_id)
                                                <td id="teacher_name-{{$lassign->id}}">{{$teacher->name}}</td>
                                            @endif
                                        @endforeach
                                        @foreach($data['lessons'] as $lessons)
                                            @if($lessons->id==$lassign->lessons_id)
                                                <td id="lessons_name-{{$lassign->id}}">{{$lessons->lessons_name}}</td>
                                                <td id="lessons_code-{{$lassign->id}}">{{$lessons->lessons_code}}</td>
                                                <td id="lessons_content-{{$lassign->id}}">{{$lessons->lessons_content}}</td>
                                            @endif
                                        @endforeach
                                        <td><a href="javascript:void (0)"><i id="@php echo $lassign->id; @endphp"
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
                                    <th>Öğretmenin Adı</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody id="teachers">
                                @foreach($data['department'] as $department)
                                    <tr id="item-{{$department->id}}">

                                        <td id="teacher-{{$department->id}}">{{$department->departments_name}}</td>
                                        <td hidden
                                            id="teacher_user-{{$department->id}}">{{$department->departments_number}}</td>

                                        <td><a href="javascript:void (0)"><i id="@php echo $department->id; @endphp"
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
                    <form action="{{route('lassigndepartment.update',$data['lassigndepartmen']->id)}}" method="post"
                          role="form">
                        @csrf
                        @method('put')
                        @foreach($data['lassign'] as $lassign)
                            @if($lassign->id==$data['lassigndepartmen']->lassign_id)
                                @foreach($data['teacher'] as $teacher)
                                    @if($teacher->user_id==$lassign->users_id)
                                        <div class="form-group">
                                            <input type="hidden" value="{{$lassign->id}}" id="lessons_id"
                                                   name="lessons_id">
                                            <label>Öğretmenin Adı</label>
                                            <input type="text" readonly value="{{$teacher->name}}" id="teacher_name"
                                                   class="form-control" class="btn btn-primary"
                                                   data-toggle="modal" data-target="#myModal" name="teacher_name"
                                                   required
                                                   placeholder="Enter ...">
                                        </div>
                                    @endif
                                @endforeach
                                @foreach($data['lessons'] as $lessons)
                                    @if($lessons->id==$lassign->lessons_id)
                                            <div class="form-group">
                                                <label>Dersin Adı</label>
                                                <input type="text" readonly value="{{$lessons->lessons_name}}" id="lessons_name"
                                                       class="form-control" class="btn btn-primary"
                                                       data-toggle="modal" data-target="#myModal" name="lessons_name" required
                                                       placeholder="Enter ...">
                                            </div>

                                            <div class="form-group">
                                                <label>Dersin Açıklaması</label>
                                                <input type="text" value="{{$lessons->lessons_content}}" id="lessons_content"
                                                       class="form-control" name="lessons_content" disabled
                                                       placeholder="Enter ...">
                                            </div>
                                            <div class="form-group">
                                                <label>Dersin Kodu</label>
                                                <input type="text" value="{{$lessons->lessons_code}}" id="lessons_code"
                                                       class="form-control" name="lessons_content" disabled
                                                       placeholder="Enter ...">
                                            </div>
                                        @endif
                                @endforeach



                            @endif
                        @endforeach
                        @foreach($data['department'] as $department)
                            @if($department->id==$data['lassigndepartmen']->department_id)
                                <div class="form-group">
                                    {{--                           Teachers İd --}}
                                    <input type="hidden" value="{{$department->id}}" id="teacher_id"
                                           name="departments_id">
                                    <label>Öğretmenin Adı</label>
                                    <input type="text" value="{{$department->departments_name}}" readonly
                                           class="form-control"
                                           id="teachers_name" class="btn btn-primary"
                                           data-toggle="modal" data-target="#myModal1" name="departments_name" value=""
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

            teacher_name = "teacher_name-";
            res1 = teacher_name.concat(destroy_id);
            teacher_name = document.getElementById(res1).innerHTML;
            $("#teacher_name").val(teacher_name);
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
            str1 = "teacher-";
            res = str1.concat(destroy_id);
            satir = document.getElementById(res).innerHTML;
            $("#teachers_name").val(satir);


            $("#teacher_id").val(destroy_id);


        });


    </script>
@endsection
