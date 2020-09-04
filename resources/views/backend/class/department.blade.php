@extends('backend.layout')
@section('content')
    <div class="content-wrapper">
        <section class="content container-fluid">
            <div class="row text-center my-4 mx-auto">
                @foreach( $data['lassign_departments'] as $lassign_departments)
                @foreach( $data['department'] as $department)
                    @if($lassign_departments->department_id==$department->id)
                    <form action="">
                        @csrf
                        <div class="col-md-3 my-4 ">
                            <div class="card">
                                <h1>Sınıfı:{{$department->departments_name}}</h1>
{{--                                <p class="price">{{$teacher->phone}}</p>--}}
{{--                                <p>{{$class->lessons_content}}</p>--}}
{{--                                <input type="hidden" name="teacher_id" value="{{$teacher->id}}">--}}
{{--                                <input type="hidden" name="lessons_id" value="{{$lassign->lessons_id}}">--}}
{{--                                <input type="text" name="lassign_id" value="{{$lassign->id}}">--}}
                                <p><button type="submit" >incele</button></p>
                            </div>
                        </div>
                    </form>
                        @endif
                @endforeach
                @endforeach
            </div>
        </section>
    </div>
@endsection
