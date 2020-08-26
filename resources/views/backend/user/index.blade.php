
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
                            <h3 class="box-title">Kullanıcılar</h3>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Kullanıcılar</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody id="sortable">
                                @foreach($data['users'] as $users)
                                <tr id="item-{{$users->id}}">

                                    <td>{{$users->username}}</td>
                                @foreach($data['roles'] as $roles)
                                    @if($users->role_id ==$roles->id)
                                            <td>{{$roles->name}}</td>
                                @endif


                                @endforeach
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
                        type:"DELETE",
                        url:"teacher/"+destroy_id,
                        success:function (msg) {
                            if(msg)
                            {
                                // $("#item-"+destroy_id).remove();
                                alertify.success('Silme işlemi Başarılı...')

                            }
                            else
                            {
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
