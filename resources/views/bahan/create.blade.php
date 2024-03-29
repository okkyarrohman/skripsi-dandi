@extends('layouts.layout-admin')
@section('content')
<div class="row">
    <div class="w-full">
        <span class="card shadow text-decoration-none" style="display: flex; ">
            <div class="card-body" style="justify-content: left;">
                <div style="font-size: 24px; margin-bottom: 10px;">Tambah Bahan</div>
                <hr style="border: 1px solid #868181; margin-bottom: 10px;">
                <form class="form-horizontal" action="#" method="POST">
                    <div style="font-size: 16px; margin-bottom: 10px;">Nama</div>
                    <div class="input-group input-group-merge" style="max-width: 400px; margin-bottom: 10px;">
                        <input type="text" class="form-control" placeholder="Nama" aria-describedby="basic-addon-search31">
                    </div>
                    <div style="font-size: 16px; margin-bottom: 10px;">Satuan</div>
                    <div class="input-group input-group-merge" style="max-width: 400px; margin-bottom: 10px;">
                        <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                            <option selected="">Pilih Satuan</option>
                            <option value="1">Pcs</option>
                            <option value="2">Gram</option>
                            <option value="3">Kg</option>
                          </select>
                    </div>
                    <div style="font-size: 16px; margin-bottom: 10px;">Stok</div>
                    <div class="input-group input-group-merge" style="max-width: 400px; margin-bottom: 10px;">
                        <input type="text" class="form-control" placeholder="Stok"  aria-describedby="basic-addon-search31">
                    </div>

                    <div style="text-align: left; justify-content:space-between; margin-top:3%;">
                        <a href="{{ route('bahan.index') }}" class="btn  btn-delete" style=" background-color: #fff; color: #4f60e0; border: 1px solid #4f60e0; border-radius: 25px; cursor: pointer; width: 100px; text-align: center; display: inline-block;">Batal</a>
                        <button type="submit" class="btn  btn-delete" style="background-color: #4f60e0; color: #fff; border: none; border-radius: 25px; cursor: pointer; width: 100px; text-align: center; display: inline-block;">Simpan</button>
                    </div>
                </form>
            </div>
        </span>
    </div>
</div>


@endsection

