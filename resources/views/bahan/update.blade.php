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
                    <div style="display: flex; flex-wrap: wrap;">
                        <div style="flex: 1; margin-right: 10px;">
                            <div style="font-size: 16px; margin-bottom: 10px;">Nama</div>
                            <div class="input-group input-group-merge" style="max-width: 400px; margin-bottom: 10px;">
                                <input type="text" name="name" value="{{$bahans->name}}" class="form-control" placeholder="Nama..." aria-describedby="basic-addon-search31">
                            </div>
                             <div style="font-size: 16px; margin-bottom: 10px;">Satuan</div>
                            <div class="input-group input-group-merge" style="max-width: 400px; margin-bottom: 10px;">
                                <select class="form-select" name="satuan" id="exampleFormControlSelect1" aria-label="Default select example">
                                    <option selected="{{$bahans->satuan}}">{{$bahans->satuan}}</option>
<<<<<<< HEAD
  <option value="Sachet">Sachet</option>
                                    <option value="Pieces (Pcs)">Pieces (Pcs)</option>
                                    <option value="Gram (G)">Gram (G)</option>
                                    <option value="Kilogram (Kg)">Kilogram (Kg)</option>
                                    <option value="Liter (L)">Liter (L)</option>
                                    <option value="MiliLiter (Ml)">MiliLiter (Ml)</option>
                                    <option value="Bottle">Bottle</option>
=======
 <option value="Sachet (Pcs)">Sachet (Pcs)</option>
                                    <option value="Gram (G)">Gram (G)</option>
                                    <option value="Kilogram (Kg)">Kilogram (Kg)</option>
                                    <option value="Liter (L)">Liter (L)</option>
>>>>>>> edfe97a6ebded720bfe69098adfac1cc3a9f07dd
                                    <option value="Buah">Buah</option>
                                </select>
                            </div>
                            <div style="font-size: 16px; margin-bottom: 10px;">Stok</div>
                            <div class="input-group input-group-merge" style="max-width: 400px; margin-bottom: 10px; display: flex; align-items: center;">
                                <input type="text" name="stokAkhir" value="{{$bahans->stokAkhir}}" class="form-control" placeholder="Stok akhir..." aria-describedby="basic-addon-search31">
                                <span style="margin: 0 6px;">Dari</span>
                                <input type="text" readonly name="stokAwal" value="{{$bahans->stokAwal}}"  class="form-control" placeholder="Stok awal..." aria-describedby="basic-addon-search31">
                            </div>
                            <!--<div style="font-size: 16px; margin-bottom: 10px;">Estimasi Jadwal Penerimaan</div>-->
                            <!--<div class="input-group input-group-merge" style="max-width: 400px; margin-bottom: 10px;">-->
                            <!--    <input class="form-control" name="jadwalPenerimaan" value="{{$bahans->jadwalPenerimaan}}" type="date" id="html5-date-input">-->
                            <!--</div>-->
                            <!--<div style="font-size: 16px; margin-bottom: 10px;">Jadwal Kedatangan</div>-->
                            <!--<div class="input-group input-group-merge" style="max-width: 400px; margin-bottom: 10px;">-->
                            <!--    <input class="form-control" name="jadwalKedatangan" type="date" value="{{$bahans->jadwalKedatangan}}" id="html5-date-input">-->
                            <!--</div>-->
                        </div>
                        <div style="flex: 1;">
<<<<<<< HEAD
                           
=======

>>>>>>> edfe97a6ebded720bfe69098adfac1cc3a9f07dd
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

