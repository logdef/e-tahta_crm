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
                            <h3 class="box-title">Paket Dersler</h3>
                            <div align="right">
                                <a href="{{route('product.create')}}">
                                    <button class="btn btn-success">Ekle</button>
                                </a>
                            </div>
                        </div>
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Paket Adı</th>
                                    <th>Açıklama</th>
                                    <th>Paket Kodu</th>
                                    <th>Paket Ücreti</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data['package'] as $package)
                                    <tr id="item-{{$package->id}}">

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
                                        <td>{{$package->package_content}}</td>
                                        <td>{{$package->package_code}}</td>
                                        <td>{{$package->package_price}}</td>
                                        <td><a href="{{route('product.edit',$package->id)}}"><i
                                                    class="fa fa-pencil-square"></i></a></td>
                                        <td><a href="javascript:void (0)"><i id="@php echo $package->id; @endphp"
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
                        url: "lessonspackage/" + destroy_id,
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
