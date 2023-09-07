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
                <div class="card-header">Update Food</div>

                <div class="card-body">
                    <form action="{{route('food.update', [$foods->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="mb-3">
                            <label for="name">Nama Food</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{$foods->name}}" name="name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name">Deskripsi</label>
                            <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" value="{{$foods->description}}" name="deskripsi">
                            @error('deskripsi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name">Harga</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" value="{{$foods->price}}" name="price">
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <select name="category" class="form-control @error('category') is-invalid @enderror">
                                <option value="">Pilih Kategori</option>
                                @foreach(App\Models\Category::all() as $category)
                                <option value="{{$category->id}}" @if($category->id == $foods->category_id) selected @endif>{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name">Gambar</label>
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar">
                            @error('gambar')
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