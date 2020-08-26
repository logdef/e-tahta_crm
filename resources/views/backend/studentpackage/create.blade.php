@extends('backend.layout')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Ders Atama
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
                                    <th>Paket Adı</th>
                                    <th>Açıklama</th>
                                    <th>Paket Kodu</th>
                                    <th>Paket Ücreti</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody id="sortable">
                                @foreach($data['package'] as $package)
                                    <tr id="package_id-{{$package->id}}">
                                        <td hidden id="package_name-{{$package->id}}">{{$package->package_name}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="dropbtn">{{$package->package_name}}</button>
                                                <div class="dropdown-content">
                                                    @foreach($data['packagelessons'] as $packagelessons)
                                                        <table >
                                                            <tr>
                                                                @if($package->id==$packagelessons->package_id)

                                                                    @foreach($data['lassign'] as $lassign)
                                                                        @if($packagelessons->lassign_id==$lassign->id)
                                                                            @foreach($data['lessons'] as $lessons)
                                                                                @if($lessons->id==$lassign->lessons_id)


                                                                                    <td><a href="#">{{$lessons->lessons_name}}</a></td>
                                                                                @endif
                                                                            @endforeach

                                                                            @foreach($data['teacher'] as $teacher)
                                                                                @if($teacher->user_id==$lassign->users_id)
                                                                                    <td> <a href="#">{{$teacher->name}}</a></td>
                                                                                @endif
                                                                            @endforeach
                                                                        @endif

                                                                    @endforeach

                                                                @endif
                                                            </tr>
                                                        </table>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </td>
                                        <td id="package_content-{{$package->id}}">{{$package->package_content}}</td>
                                        <td id="package_code-{{$package->id}}">{{$package->package_code}}</td>
                                        <td id="package_price-{{$package->id}}">{{$package->package_price}}</td>
                                        <td><a href="javascript:void (0)"><i id="@php echo $package->id; @endphp"
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

                    <form action="{{route('studentpackage.store')}}" method="post" role="form">
                        @csrf

                        <div class="form-group">
                            <input type="hidden" id="package_id" name="package_id" >
                            <label>Paket Adı</label>
                            <input type="text" readonly id="package_name" class="form-control" class="btn btn-primary"
                                   data-toggle="modal" data-target="#myModal" name="package_name" required
                                   placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>Paket Açıklaması</label>
                            <input type="text" id="package_content" class="form-control" name="package_content" disabled
                                   placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>Paket Kodu</label>
                            <input type="text" id="package_code" class="form-control" name="package_code" disabled
                                   placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>Paket Ücreti</label>
                            <input type="text" id="package_price" class="form-control" name="package_price" disabled
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


            package_name = "package_name-";
            res1 = package_name.concat(destroy_id);
            package_name = document.getElementById(res1).innerHTML;
            $("#package_name").val(package_name);

            package_content = "package_content-";
            res2 = package_content.concat(destroy_id);
            package_content = document.getElementById(res2).innerHTML;
            $("#package_content").val(package_content);


            package_code = "package_code-";
            res3 = package_code.concat(destroy_id);
            package_code = document.getElementById(res3).innerHTML;
            $("#package_code").val(package_code);

            package_price = "package_price-";
            res3 = package_price.concat(destroy_id);
            package_price = document.getElementById(res3).innerHTML;
            $("#package_price").val(package_price);


            $("#package_id").val(destroy_id);


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
