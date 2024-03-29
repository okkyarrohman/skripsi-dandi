@extends('layouts.layout-admin')
@section('content')
<div class="row">
    <div class="w-full">
        <span class="card shadow text-decoration-none" style="display: flex; ">
            <div class="card-body" style="justify-content: left;">
                <form class="form-horizontal" action="#" method="GET">
                    <div style="font-size: 20px; margin-bottom: 10px;"> Hasil Perhitungan Material Requirement Planning</div>
                    <hr style="border: 1px solid #868181; margin-bottom: 10px;">
                    <div style="font-size: 16px; margin-bottom: 10px;">Nama Bahan</div>
                        <div class="input-group input-group-merge" style="max-width: 400px; margin-bottom: 10px;">
                            <input type="text" class="form-control" placeholder="Gula" aria-describedby="basic-addon-search31">
                        </div>
                        <div style="font-size: 16px; margin-bottom: 10px;">Rentang Waktu Perencanaan</div>
                        <div class="input-group input-group-merge" style="max-width: 400px; margin-bottom: 10px; display: flex; align-items: center;">
                        <div style="flex: 1;">
                            <input class="form-control" type="date" value="2021-06-18" id="html5-date-input">
                        </div>
                        <div style="margin: 0 6px;">
                            <span>-</span>
                        </div>
                        <div style="flex: 1;">
                            <input class="form-control" type="date" value="2021-06-18" id="html5-date-input">
                        </div>

                    </div>
                    <div style="text-align: left; justify-content:space-between; ">
                        <a href="#"class="btn  btn-delete" type="button" style=" background-color: #4f60e0; color: #fff; border: none; border-radius: 4px; cursor: pointer;">Cetak</a>
                    </div>
                </form>
            </div>
        </span>
    </div>
</div>
<table id="table-register" class="table table-bordered table-hover" style="margin-top: 5%;">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Kebutuhan Bruto</th>
            <th>Tersedia</th>
            <th>Kebutuhan Bersih</th>
            <th>Status</th>
        </tr>
    </thead>
    <!-- Isi tabel -->
    <tbody>
        @php
            $i=1;
        @endphp
            <tr>
                <td>{{ $i++ }}</td>
                <td>01/04/2024</td>
                <td>1000 gram</td>
                <td>1200 gram</td>
                <td>200 gram</td>
                <td>Cukup</td>
            </tr>
            <tr>
                <td>{{ $i++ }}</td>
                <td>02/04/2024</td>
                <td>1000 gram</td>
                <td>1000 gram</td>
                <td>0 gram</td>
                <td>Cukup</td>
            </tr>
            <tr>
                <td>{{ $i++ }}</td>
                <td>03/04/2024</td>
                <td>1200 gram</td>
                <td>1100 gram</td>
                <td>-100 gram</td>
                <td>Kurang</td>
            </tr>
            <!-- Tambahkan baris sesuai data yang ada -->
    </tbody>
</table>

<div style="margin-top:3%; display: flex; justify-content: space-between;">
    <i class="fa-solid fa-triangle-exclamation" style="font-size:200%; align-self: center;"></i>
    <div style="margin-left: 10px;">
      <span>Perhatian! Terdapat bahan baku yang kurang untuk memenuhi kebutuhan produksi pada rentang waktu tertentu. Mohon untuk segera mengambil tindakan yang diperlukan untuk memastikan kelancaran proses produksi!</span>
    </div>
  </div>



@endsection

