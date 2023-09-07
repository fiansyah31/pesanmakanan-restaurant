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
            <div class="card">
                <div class="card-header">All Pesanan</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>

                                <td>Kode</td>
                                <td>Nama Pesanan</td>
                                <td>Meja</td>
                                <td>Quantity</td>
                                <td>Harga</td>
                                <td>Status</td>
                                <td>Edit</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($pesanan)>0)
                            @foreach($pesanan as $d)
                            <tr>
                                <td>{{$d->kode}}</td>
                                <td>{{$d->nama_pesanan}}</td>
                                <td>{{$d->nomor_meja}}</td>
                                <td>{{$d->quantity}}</td>
                                <td>{{$d->harga}}</td>
                                <td>
                                    {{$d->status == 0 ? 'Belum Bayar' : 'Sudah Bayar'}}

                                </td>
                                <td>
                                    <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#edit{{$d->id}}">
                                        Edit
                                    </button>
                                    <div class="modal fade" id="edit{{$d->id}}" tabindex="-1" aria-labelledby="edit{{$d->id}}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="edit{{$d->id}}">Edit Data</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('pesanan.update' , [$d->id])}}" method="post">
                                                        @csrf
                                                        {{method_field('PUT')}}
                                                        <div class="mb-3">
                                                            <label for="Nama Pesanan">Nama Pesanan</label>
                                                            <input type="text" readonly value="{{$d->nama_pesanan}}" class="form-control">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="Meja">Meja</label>
                                                            <input type="number" readonly value="{{$d->nomor_meja}}" class="form-control">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="Harga">Total Harga</label>
                                                            <input type="number" readonly value="{{$d->harga}}" class="form-control">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="Quantity">Quantity</label>
                                                            <input type="number" readonly value="{{$d->quantity}}" class="form-control">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="Keterangan">Keterangan</label>
                                                            <textarea class="form-control" readonly>{{$d->keterangan}}</textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="status">Status</label>
                                                            <select name="status" class="form-control" required>
                                                                @if($d->status == 0)
                                                                <option value="0" selected>Belum Bayar</option>
                                                                <option value="1">Sudah Bayar</option>
                                                                @else
                                                                <option value="1" selected>Sudah Bayar</option>
                                                                <option value="0">Belum Bayar</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
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
                    {{$pesanan->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection