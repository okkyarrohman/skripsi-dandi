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
                    <div id="bahan-container">
                        <!-- Input bahan_id awal -->

                        <div class="input-group input-group-merge" style="margin-bottom: 10px;">
                            <div style="margin-bottom: 5px; margin-right:3%;">
                                <span>Nama Bahan</span>
                                <select class="form-select" name="bahan_id[]" aria-label="Default select example">
                                    <option selected disabled>Pilih Bahan Baku</option>
                                    @foreach($bahans as $bahan)
                                    <option value="{{ $bahan->id }}">{{ $bahan->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div style="margin-bottom: 5px; margin-right:3%;">
                                <span>Satuan</span>
                                <select class="form-select" name="satuan[]" aria-label="Default select example">
                                    <option selected="">Pilih Satuan</option>
                                                                        <option value="Sachet (Pcs)">Sachet (Pcs)</option>
                                    <option value="Gram (G)">Gram (G)</option>
                                    <option value="Kilogram (Kg)">Kilogram (Kg)</option>
                                    <option value="Liter (L)">Liter (L)</option>
                                    <option value="Buah">Buah</option>
                                </select>
                            </div>
                            <div>
                                <span>Jumlah</span>
                                <input type="text" name="jumlah[]" class="form-control" placeholder="Masukkan Jumlah" aria-describedby="defaultFormControlHelp">
                            </div>
                        </div>

                    </div>

                    <button type="button" id="btnAddBahan" class="btn btn-primary">Tambah Bahan</button>

                    <div style="text-align: left; justify-content:space-between; margin-top:3%;">
                        <a href="{{ route('bom.index') }}" class="btn  btn-delete" style=" background-color: #fff; color: #4f60e0; border: 1px solid #4f60e0; border-radius: 25px; cursor: pointer; width: 100px; text-align: center; display: inline-block;">Batal</a>
                        <button type="submit" class="btn  btn-delete" style=" background-color: #4f60e0; color: #fff; border: none; border-radius: 25px; cursor: pointer; width: 100px; text-align: center; display: inline-block;">Simpan</button>
                    </div>
                </form>
            </div>
        </span>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
      const btnAddBahan = document.getElementById("btnAddBahan");
      btnAddBahan.addEventListener("click", function() {
        tambahFieldBahan();
      });

      function tambahFieldBahan() {
        const bahanContainer = document.getElementById("bahan-container");
        const inputGroupMerge = document.createElement("div");
        inputGroupMerge.classList.add("input-group", "input-group-merge");
        inputGroupMerge.style.marginBottom = "10px";

        const inputNamaBahan = document.createElement("div");
        inputNamaBahan.style.marginBottom = "5px";
        inputNamaBahan.style.marginRight = "3%";
        inputNamaBahan.innerHTML = `
          <span>Nama Bahan</span>
          <select class="form-select" name="bahan_id[]" aria-label="Default select example">
            <option selected disabled>Pilih Bahan Baku</option>
            @foreach($bahans as $bahan)
            <option value="{{ $bahan->id }}">{{ $bahan->name }}</option>
            @endforeach
          </select>
        `;

        const inputSatuan = document.createElement("div");
        inputSatuan.style.marginBottom = "5px";
        inputSatuan.style.marginRight = "3%";
        inputSatuan.innerHTML = `
          <span>Satuan</span>
          <select class="form-select" name="satuan[]" aria-label="Default select example">
            <option selected="">Pilih Satuan</option>
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
        `;

        const inputJumlah = document.createElement("div");
        inputJumlah.innerHTML = `
          <span>Jumlah</span>
          <input type="text" name="jumlah[]" class="form-control" placeholder="Masukkan Jumlah" aria-describedby="defaultFormControlHelp">
        `;

        inputGroupMerge.appendChild(inputNamaBahan);
        inputGroupMerge.appendChild(inputSatuan);
        inputGroupMerge.appendChild(inputJumlah);
        bahanContainer.appendChild(inputGroupMerge);
      }
    });
    </script>


@endsection

