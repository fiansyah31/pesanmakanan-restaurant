@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
    @endif
    @foreach($categories as $category)
    <h3 class="mt-3">-{{$category->name}}-</h3>
    <div class="row mt-3 mb-3">
        @foreach(App\Models\Food::where('category_id', $category->id)->get() as $food)
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-body">
                    <img src="{{asset('image')}}/{{$food->image}}" class="img-fluid" alt="thumbnail">
                    <h5 class="mt-3 fw-bold">{{$food->name}}</h5>
                    <span>Rp. {{$food->price}}</span> <br>
                    <a href="{{route('detail', [$food->id])}}" class="btn btn-outline-success mt-2">Lihat</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endforeach
</div>
@endsection