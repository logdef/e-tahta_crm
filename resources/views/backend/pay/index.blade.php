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
                            <h3 class="box-title">Ödemeler Tablosu</h3>
                        </div>
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Öğrenci Adı</th>
                                    <th>Okul No</th>
                                    <th>Ücret</th>
                                    <th>Ödenen</th>
                                    <th>Kalan</th>
                                    

                                </tr>
                                </thead>
                              
                                <form action="{{route('odemetablo.list')}}" method="post"> 
                                <input type="text" class="form-control" name="user_id" placeholder="Öğrenci numarasını giriniz..">
                                <button type="submit" name="odeme"   class="btn btn-primary" data-dismiss="modal">Bul</button>
                                @csrf
                                </form>                
                                        </br></br></br>

                                       
                                          
                                            @foreach($data['payments'] as $payments)
                                                @foreach($data['student'] as $student)
                                                @if($student->user_id==$payments->user_id)
                                                <td>{{$student->name}}</td>
                                                @endif
                                                @endforeach
                                             <td>{{$payments->user_id}}</td>
                                             <td>{{$payments->student_debt}} ₺</td>
                                             <td>{{$payments->student_paid}} ₺</td>
                                             <td>{{$payments->current_debt}} ₺</td>
                                             <td><a href="{{route('payment.edit',$payments->id)}}">
                                                 <i class="fa fa-edit"></i>Ödeme İşlemleri</a></td>
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

   
   
@endsection
           


                                
                           
  
                        
                                   
                                        
                                      
                                      
                                     
                                  
                               
              
                                    