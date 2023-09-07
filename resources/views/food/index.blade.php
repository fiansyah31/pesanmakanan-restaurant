@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            @endif
            <a href="{{route('food.create')}}" class="btn btn-dark mb-3">Tambah</a>
            <div class="card">
                <div class="card-header">All Foods</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>

                                <td>Gambar</td>
                                <td>Nama</td>
                                <td>Deskripsi</td>
                                <td>Price</td>
                                <td>Category</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($foods)>0)
                            @foreach($foods as $d)
                            <tr>

                                <td><img src="{{asset('image')}}/{{$d->image}}" width="100" alt="gambar-food"></td>
                                <td>{{$d->name}}</td>
                                <td>{{$d->description}}</td>
                                <td>{{$d->price}}</td>
                                <td>{{$d->category->name}}</td>
                                <td><a href="{{route('food.edit',[$d->id])}}" class="btn btn-outline-primary">Edit</a></td>
                                <td>
                                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete{{$d->id}}">
                                        Hapus
                                    </button>
                                    <div class="modal fade" id="delete{{$d->id}}" tabindex="-1" aria-labelledby="delete{{$d->id}}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="delete{{$d->id}}">Hapus Data</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Yakin ingin menghapus Food {{$d->name}} ?
                                                    <form action="{{route('food.destroy' , [$d->id])}}" method="post">
                                                        @csrf
                                                        {{method_field('DELETE')}}

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Hapus</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <p>Tidak ada data yang ditampilkan</p>
                            @endif
                        </tbody>
                    </table>
                    {{$foods->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection