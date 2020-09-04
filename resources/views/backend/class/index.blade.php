@extends('backend.layout')

@section('content')
    <div class="content-wrapper">
        <section class="content container-fluid">
            <div class="row text-center my-4 mx-auto">
                @foreach( $data['class'] as $class)
                    <form action="{{route('class.teacher')}}">
                        @csrf
                        <div class="col-md-3 my-4 ">
                        <div class="card">
                            <h1>{{$class->lessons_name}}</h1>
                            <p class="price">{{$class->lessons_code}}</p>
                            <p>{{$class->lessons_content}}</p>
                            <input type="hidden" name="lessons_id" value="{{$class->id}}">
                            <p><button type="submit" >incele</button></p>
                        </div>
                        </div>

                    </form>
                @endforeach
            </div>
        </section>
    </div>
@endsection
