@extends('layouts.layout-admin')
@section('content')
<span style="font-size: 25px; ">MASTER PRODUCTION SCHEDULE</span>
<div class="row" style="margin-top:2%;">
    <div class="w-full">
        <span class="card shadow text-decoration-none" style="display: flex; ">
            <div class="card-body" style="justify-content: left;">
                <form class="form-horizontal" action="#" method="POST">
                    {{-- <div style="font-size: 20px; margin-bottom: 10px;">Cari MPS</div> --}}
                    <div class="input-group input-group-merge" style="max-width: 400px; margin-bottom: 10px; display: flex; align-items: center;">
                        <div style="flex: 1;">
                            <div style="font-size: 16px; margin-bottom: 10px;">Tanggal awal</div>
                            <input class="form-control" type="date" value="2021-06-18" id="html5-date-input">
                        </div>
                        <div style="margin: 0 4px;">
                        </div>
                        <div style="flex: 1;">
                            <div style="font-size: 16px; margin-bottom: 10px;">Tanggal akhir</div>
                            <input class="form-control" type="date" value="2021-06-18" id="html5-date-input">
                        </div>
                    </div>
                    <div style="text-align: left; justify-content:space-between">
                        <button type="button" class="btn  btn-delete" style="background-color: #28a745; color: #fff; border: none; border-radius: 4px; cursor: pointer;">Cari</button>
                        <a href="{{ route('mps.create') }}"class="btn  btn-delete" type="button" style=" background-color: #4f60e0; color: #fff; border: none; border-radius: 4px; cursor: pointer;">Tambah</a>
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
            <th>Nama Menu</th>
            <th>Jumlah Produksi</th>
            <th style="text-align: center;">Action</th>
        </tr>
    </thead>
    <!-- Isi tabel -->
    <tbody>
        @php
            $i=1;
        @endphp
            <tr>
                <td>{{ $i++ }}</td>
                <td>2024-04-01</td>
                <td>AAAAAA</td>
                <td>12 Gelas</td>
                <td>
                    <div style="display: flex; justify-content: center;">
                        <a href="{{ route('mps.update') }}" class="btn  btn-delete" style="color:white; margin-left: 10px; background-color: rgb(0, 106, 255);">Update</a>
                        <div style="width: 20px;"></div> <!-- Separator -->
                        <a href="#" class="btn  btn-delete" style="color:white; margin-left: 10px; background-color: red;">Delete</a>
                    </div>
                </td>
            </tr>
            <!-- Tambahkan baris sesuai data yang ada -->
    </tbody>
</table>


@endsection

