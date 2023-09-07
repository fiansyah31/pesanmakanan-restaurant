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
            <a href="{{route('category.create')}}" class="btn btn-dark mb-3">Tambah</a>
            <div class="card">
                <div class="card-header">All Category</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Nama</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($category)>0)
                            @foreach($category as $key => $d)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$d->name}}</td>
                                <td><a href="{{route('category.edit',[$d->id])}}" class="btn btn-outline-primary">Edit</a></td>
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
                                                    Yakin ingin menghapus kategori {{$d->name}} ?
                                                    <form action="{{route('category.destroy' , [$d->id])}}" method="post">
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
                </div>
            </div>
        </div>
    </div>
</div>

@endsection