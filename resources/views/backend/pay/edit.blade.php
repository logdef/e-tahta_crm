@extends('backend.layout')

@section('content')
<!-- <link rel="stylesheet" href="/backend/dist/css/backend.css"> -->
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
                            <h3 class="box-title">Ödemeleri Yönet</h3>
                        </div>


                        <form action="{{route('payment.store')}}" method="post" role="form">
                        @csrf

                        <div class="form-group">
                            <input type="hidden" id="student_name" name="student_name">
                            <label>Öğrenci Adı</label>

                            <input type="text" readonly id="user_id" class="form-control" class="btn btn-primary"
                                   data-toggle="modal" data-target="#myModal" name="user_id" required value="{{$data['s']->name}}" 
                                   placeholder="Enter ...">

                                   <div class="form-group">
                           
                            <label>Öğrenci No</label>

                            <input type="text"  readonly id="user_id" class="form-control" class="btn btn-primary"
                                   data-toggle="modal" data-target="#myModal" name="user_id" required value="{{$data['s']->user_id}}" 
                                   placeholder="Enter ...">


                        </div>
                        <div class="form-group">
                            <label>Ödenen Tutar</label>
                            <input type="text" id="student_paying" class="form-control" name="student_paying" 
                                   placeholder="Enter ...">
                        </div>
                        <div>
                       <label>Ödeme Tipi</label></br>
                        <input type="radio" id="cash" name="gender" value="0">
                        <label for="male">Nakit</label>
                        <input type="radio" id="card" name="gender" value="1">
                        <label for="female">Kart</label><br>
 
                        </div>

                        <div class="modal-footer">
                            <button type="submit"  class="btn btn-primary" data-dismiss="modal">Ödeme Oluştur</button>
                        </div>

                        </form>
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Öğrenci Adı</th>
                                    <th>Okul No</th>
                                    <th>Ödenen Tutar</th>
                                    <th>Ödeme Tipi</th>
                                    <th>Ödeme Tarihi</th>
                                    
                                </tr>
                                </thead>
                                    

                
                                            
                                            @foreach($data['paying'] as $paying)
                                                @foreach($data['student'] as $student)
                                                @if($student->user_id==$paying->user_id)
                                                <td>{{$student->name}}</td>
                                                @endif
                                                @endforeach
                                             <td>{{$paying->user_id}}</td>
                                             <td>{{$paying->student_paying}} ₺</td>
                                             @if($paying->pay_type=='0')
                                             <td>Nakit</td>
                                             @else
                                             <td>Kart</td>
                                             @endif
                                             <td>{{$paying->created_at}} </td>
                                        
                                     <td><a href="javascript:void (0)"><i id="@php echo $paying->id; @endphp" class="fa fa-trash-o"></i></a></td>
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
                            url: "payment/" + destroy_id,
                        success: function (msg) {

                            if (msg) {
                              
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