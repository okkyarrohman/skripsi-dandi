@extends('layouts.layout-admin')
@section('content')
<div class="row">
    <div class="w-full">
        <span class="card shadow text-decoration-none" style="display: flex; ">
            <div class="card-body" style="justify-content: left;">
                <form class="form-horizontal" action="#" method="POST">
                    <div style="font-size: 20px; margin-bottom: 10px;">Buat BOM</div>
                    <span>Nama Menu</span>
                    <div class="input-group input-group-merge" style="max-width: 400px; margin-bottom: 10px;">
                        <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                            <option selected="">Pilih Menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <span>Nama Bahan Baku</span>
                    <div class="input-group input-group-merge" style="max-width: 400px; margin-bottom: 10px;">
                        <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                            <option selected="">Pilih Bahan Baku</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <span>Jumlah</span>
                    <div class="input-group input-group-merge" style="max-width: 400px; margin-bottom: 10px;">
                        <input type="text" class="form-control" id="defaultFormControlInput" placeholder="Masukkan Jumlah" aria-describedby="defaultFormControlHelp">
                    </div>
                    <div style="text-align: left; justify-content:space-between">
                        <button type="submit" style="padding: 8px 16px; background-color: #4f60e0; color: #fff; border: none; border-radius: 4px; cursor: pointer;">Simpan</button>
                    </div>
                </form>
            </div>
        </span>
    </div>
</div>


@endsection

