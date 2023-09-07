@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('error'))
            <div class="alert alert-danger">
                {{Session::get('error')}}
            </div>
            @endif
            <div class="card">
                <div class="card-header">Update Category</div>

                <div class="card-body">
                    <form action="{{route('category.update', [$category->id])}}" method="post">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="mb-3">
                            <label for="name">Nama category</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{$category->name}}" name="name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary py-2 px-3">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection