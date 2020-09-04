@extends('backend.layout')
@section('content')
    <div class="content-wrapper">
        <section class="content container-fluid">
            <div class="row text-center my-4 mx-auto">
                @foreach( $data['lassign'] as $lassign)
                @foreach( $data['teacher'] as $teacher)
                    @if($lassign->users_id==$teacher->user_id)
                    <form action="{{route('class.department')}}">
                        @csrf
                        <div class="col-md-3 my-4 ">
                            <div class="card">
                                <h1>{{$teacher->name}}</h1>
                                <p class="price">{{$teacher->phone}}</p>
{{--                                <p>{{$class->lessons_content}}</p>--}}
                                <input type="hidden" name="lassign_id" value="{{$lassign->id}}">
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
