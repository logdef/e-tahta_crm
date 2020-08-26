@extends('backend.layout')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Derse Öğretmen Atama
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
                                    <th>Okul Adı</th>
                                    <th>Dersin Adı</th>
                                    <th>Dersin Kodu</th>
                                    <th>Açıklama</th>
                                    <th>Sınıfı</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody id="sortable">
                                @foreach($data['lessons'] as $lessons)
                                    <tr id="item-{{$lessons->id}}">
                                        @foreach($data['lessonsdepartment'] as $lessonsdepartment)
                                            @if($lessonsdepartment->lessons_id==$lessons->id)
                                            @endif
                                        @endforeach

                                        @foreach($data['school'] as $school)
                                                @if($school->id==$lessons->school_name)
                                                <td id="lessons_name-{{$lessons->id}}">{{$school->schools_name}} </td>
                                                @endif
                                            @endforeach
                                        <td id="lessons_name-{{$lessons->id}}">{{$lessons->lessons_name}}</td>
                                        <td id="lessons_code-{{$lessons->id}}">{{$lessons->lessons_code}}</td>
                                        <td id="lessons_content-{{$lessons->id}}">{{$lessons->lessons_content}}</td>



                                        <td><a href="javascript:void (0)"><i id="@php echo $lessons->id; @endphp"
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
                                @foreach($data['teacher'] as $teachers)
                                    <tr id="item-{{$teachers->id}}">

                                        <td id="teacher-{{$teachers->id}}">{{$teachers->name}}</td>
                                        <td hidden id="teacher_user-{{$teachers->id}}">{{$teachers->user_id}}</td>

                                        <td><a href="javascript:void (0)"><i id="@php echo $teachers->id; @endphp"
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
                    <h3 class="box-title">Derse Öğretmen Atama</h3>
                </div>
                <!-- /.box-header -->

                <div class="box-body">

                    <form action="{{route('lassign.store')}}" method="post" role="form">
                        @csrf

                        <div class="form-group">
                            <input type="hidden" id="lessons_id" name="lessons_id">
                            <label>Dersin Adı</label>


                            <input type="text" readonly id="lessons_name" class="form-control" class="btn btn-primary"
                                   data-toggle="modal" data-target="#myModal" name="lessons_name" required
                                   placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>Dersin Açıklaması</label>
                            <input type="text" id="lessons_content" class="form-control" name="lessons_content" disabled
                                   placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>Dersin Kodu</label>
                            <input type="text" id="lessons_code" class="form-control" name="lessons_content" disabled
                                   placeholder="Enter ...">
                        </div>


                        <div class="form-group">
                            {{--                           Teachers İd --}}
                            <input type="hidden" id="teacher_id" name="teachers_id">
                            <label>Öğretmenin Adı</label>
                            <input type="text" readonly class="form-control" id="teachers_name" class="btn btn-primary"
                                   data-toggle="modal" data-target="#myModal1" name="teacher_name" value="" required
                                   placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">
                                Ekle
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
            str1 = "teacher-";
            res = str1.concat(destroy_id);
            satir = document.getElementById(res).innerHTML;
            $("#teachers_name").val(satir);

            str1 = "teacher_user-";
            res2 = str1.concat(destroy_id);
            teacher_user = document.getElementById(res2).innerHTML;
            $("#teacher_id").val(teacher_user);


        });


    </script>
@endsection
