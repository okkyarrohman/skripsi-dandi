@extends('layouts.layout-admin')
@section('content')
<div class="row">
    <div class="w-full">
        <span class="card shadow text-decoration-none" style="display: flex; ">
            <div class="card-body" style="justify-content: left;">
                <div style="font-size: 24px; margin-bottom: 10px;">Tambah Bahan</div>
                <hr style="border: 1px solid #868181; margin-bottom: 10px;">
                <form class="form-horizontal" action="{{route('bahan.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                        <div>
                            <div style="font-size: 16px; margin-bottom: 10px;">Nama</div>
                            <div class="input-group input-group-merge" style="max-width: 400px; margin-bottom: 10px;">
                                <input type="text" name="name" class="form-control" placeholder="Nama" aria-describedby="basic-addon-search31">
                            </div>
                             <div style="font-size: 16px; margin-bottom: 10px;">Satuan</div>
                            <div class="input-group input-group-merge" style="max-width: 400px; margin-bottom: 10px;">
                                <select class="form-select" name="satuan" id="exampleFormControlSelect1" aria-label="Default select example">
                                    <option selected="">Pilih Satuan</option>
                                    <option value="Sachet (Pcs)">Sachet (Pcs)</option>
                                    <option value="Gram (G)">Gram (G)</option>
                                    <option value="Kilogram (Kg)">Kilogram (Kg)</option>
                                    <option value="Liter (L)">Liter (L)</option>
                                    <option value="Buah">Buah</option>
                                </select>
                            </div>
                            <div style="font-size: 16px; margin-bottom: 10px;">Stok</div>
                            <div class="input-group input-group-merge" style="max-width: 400px; margin-bottom: 10px;">
                                <input type="text" name="stokAwal" class="form-control" placeholder="Stok" aria-describedby="basic-addon-search31">
                            </div>
                            <!--<div style="font-size: 16px; margin-bottom: 10px;">Estimasi Jadwal Penerimaan</div>-->
                            <!--<div class="input-group input-group-merge" style="max-width: 400px; margin-bottom: 10px;">-->
                            <!--    <input class="form-control" name="jadwalPenerimaan" type="date" value="" id="html5-date-input">-->
                            <!--</div>-->
                        </div>
                        <div>

                        </div>
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

