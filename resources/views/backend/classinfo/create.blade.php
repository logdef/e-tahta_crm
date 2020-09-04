@extends('backend.layout')
@section('content')

    <div class="content-wrapper">


        <!-- Main content -->
        <section class="content container-fluid">

            <!--------------------------
              | Your Page Content Here |
              -------------------------->
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Ders İçeriği Ekleme</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form action="" method="post" role="form">
                    @csrf
                    <!-- text input -->
                        <div class="form-group">
                            <label>Dersin Haftası</label>
                            <input type="text" class="form-control" name="lessons_weeks" required
                                   placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>Dersin Konusu</label>
                            <input type="text" class="form-control" name="lessons_subject" required
                                   placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>Dersin Açıklaması</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="" rows="3"></textarea>
                        </div>
                        <div class="file-upload-wrapper">
                            <label>Derse ait PDF</label>
                            <input type="file" id="input-file-now" class="file-upload" />
                        </div>
                        <div class="file-upload-wrapper">
                            <label>Derse ait Video</label>
                            <input type="file" id="input-file-now" class="file-upload" />
                        </div>
                        <div class="form-group">
                            <label>Derse ait video urlsi</label>
                            <input type="text" class="form-control" name="lessons_price" required
                                   placeholder="Enter ...">
                        </div>

                        <div align="right" class="box-footer">
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



@endsection
