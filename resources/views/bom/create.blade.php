@extends('layouts.layout-admin')
@section('content')
<div class="row">
    <div class="w-full">
        <span class="card shadow text-decoration-none" style="display: flex; ">
            <div class="card-body" style="justify-content: left;">
                <div style="font-size: 24px; margin-bottom: 10px;">Buat BOM</div>
                <hr style="border: 1px solid #868181; margin-bottom: 10px;">
                <form class="form-horizontal" action="{{route('bom.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <span>Nama Menu</span>
                    <div class="input-group input-group-merge" style="max-width: 400px; margin-bottom: 10px;">
                        <select class="form-select" name="menu_id" id="exampleFormControlSelect1" aria-label="Default select example">
                            <option selected disabled>Pilih Menu</option>
                            @foreach($menus as $menu)
                            <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <span>Nama Bahan Baku</span>
                    <div class="input-group input-group-merge" style="max-width: 400px; margin-bottom: 10px;">
                        <select class="form-select" name="bahan_id" id="exampleFormControlSelect1" aria-label="Default select example">
                            <option selected disabled>Pilih Bahan Baku</option>
                            @foreach($bahans as $bahan)
                            <option value="{{ $bahan->id }}">{{ $bahan->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <span>Satuan</span>
                    <div class="input-group input-group-merge" style="max-width: 400px; margin-bottom: 10px;">
                        <select class="form-select" name="satuan" id="exampleFormControlSelect1" aria-label="Default select example">
                            <option selected="">Pilih Satuan</option>
                            <option value="Pcs">Pcs</option>
                            <option value="Gram">Gram</option>
                            <option value="Kg">Kg</option>
                          </select>
                    </div>
                    <span>Jumlah</span>
                    <div class="input-group input-group-merge" style="max-width: 400px; margin-bottom: 10px;">
                        <input type="text" name="jumlah" class="form-control" id="defaultFormControlInput" placeholder="Masukkan Jumlah" aria-describedby="defaultFormControlHelp">
                    </div>
                    <div style="text-align: left; justify-content:space-between; margin-top:3%;">
                        <a href="{{ route('bom.index') }}" class="btn  btn-delete" style=" background-color: #fff; color: #4f60e0; border: 1px solid #4f60e0; border-radius: 25px; cursor: pointer; width: 100px; text-align: center; display: inline-block;">Batal</a>
                        <button type="submit" class="btn  btn-delete" style=" background-color: #4f60e0; color: #fff; border: none; border-radius: 25px; cursor: pointer; width: 100px; text-align: center; display: inline-block;">Simpan</button>
                    </div>
                </form>
            </div>
        </span>
    </div>
</div>


@endsection

