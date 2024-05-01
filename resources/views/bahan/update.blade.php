@extends('layouts.layout-admin')
@section('content')
<div class="row">
    <div class="w-full">
        <span class="card shadow text-decoration-none" style="display: flex; ">
            <div class="card-body" style="justify-content: left;">
                <div style="font-size: 24px; margin-bottom: 10px;">Update Bahan</div>
                <hr style="border: 1px solid #868181; margin-bottom: 10px;">
                <form class="form-horizontal" action="{{ route('bahan.update', ['id' => $bahans->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div style="font-size: 16px; margin-bottom: 10px;">Nama</div>
                    <div class="input-group input-group-merge" style="max-width: 400px; margin-bottom: 10px;">
                        <input type="text" name="name" value="{{$bahans->name}}" class="form-control" placeholder="Nama..." aria-describedby="basic-addon-search31">
                    </div>
                    <div style="font-size: 16px; margin-bottom: 10px;">Satuan</div>
                    <div class="input-group input-group-merge" style="max-width: 400px; margin-bottom: 10px;">
                        <select class="form-select" name="satuan" id="exampleFormControlSelect1" aria-label="Default select example">
                            <option selected="{{$bahans->satuan}}">{{$bahans->satuan}}</option>
                            <option value="Pcs">Pcs</option>
                            <option value="Gram">Gram</option>
                            <option value="Kg">Kg</option>
                          </select>
                    </div>
                    <div style="font-size: 16px; margin-bottom: 10px;">Stok</div>
                    <div class="input-group input-group-merge" style="max-width: 400px; margin-bottom: 10px; display: flex; align-items: center;">
                        <div style="flex: 1;">
                            <input type="text" name="stokAkhir" value="{{$bahans->stokAkhir}}" class="form-control" placeholder="Stok akhir..." aria-describedby="basic-addon-search31">
                        </div>
                        <div style="margin: 0 6px;">
                            <span>Dari</span>
                        </div>
                        <div style="flex: 1;">
                            <input type="text" name="stokAwal" value="{{$bahans->stokAwal}}"  class="form-control" placeholder="Stok awal..." aria-describedby="basic-addon-search31">
                        </div>
                    </div>
                    <div style="text-align: left; justify-content:space-between; margin-top:3%;">
                        <a href="{{ route('bahan.index') }}" class="btn  btn-delete" style="background-color: #fff; color: #4f60e0; border: 1px solid #4f60e0; border-radius: 25px; cursor: pointer; width: 100px; text-align: center; display: inline-block;">Batal</a>
                        <button type="submit" class="btn  btn-delete" style="background-color: #4f60e0; color: #fff; border: none; border-radius: 25px; cursor: pointer; width: 100px; text-align: center; display: inline-block;">Update</button>
                    </div>
                </form>
            </div>
        </span>
    </div>
</div>


@endsection

