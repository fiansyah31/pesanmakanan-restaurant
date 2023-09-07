@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <img src="{{asset('image')}}/{{$foods->image}}" class="img-fluid" alt="">
                <div class="card-body">
                    <h3>{{$foods->name}}</h3>
                    <p>{{$foods->description}}</p>
                    <span class="fw-bold">Rp. {{$foods->price}}</span><br>
                    <button type="button" class="btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#pesanan">
                        Buat Pesanan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="pesanan" tabindex="-1" aria-labelledby="pesanan" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="pesanan">Pesanan <b>{{$foods->name}}</b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('buatpesanan')}}" method="post">
                    @csrf
                    {{method_field('POST')}}
                    <h4>
                        <input type="hidden" name="nama_pesanan" value="{{$foods->name}}">{{$foods->name}}
                    </h4>
                    <p>
                        Rp. {{$foods->price}}
                    </p>
                    <input type="hidden" id="price" class="form-control mb-3" value="{{$foods->price}}">
                    <input type="number" name="nomor_meja" placeholder="Masukan Nomor Meja" class="form-control mb-3">
                    <textarea name="keterangan" class="form-control mb-3" placeholder="Masukan Keterangan"></textarea>
                    <div class="mb-3">
                        <label for="quantity">Jumlah</label>
                        <div class="d-flex">
                            <button type="button" class="btn btn-dark" id="kurang">-</button>
                            <input readonly type="text" name="quantity" id="quantity" class="form-control px-2 mx-1" min="1" style="width: 35px;" value="1" width="10px">
                            <button type="button" class="btn btn-dark" id="tambah">+</button>
                        </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <div>
                    <span>Rp</span>. <input type="number" readonly class="border-0 fs-5 fw-bold" name="harga" id="total" value="{{$foods->price}}">
                </div>
                <div>
                    <button type="submit" class="btn btn-success py-1 px-3">Pesan</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection