@extends('layouts.layout-admin')
@section('content')
<div class="row">
    <div class="w-full">
        <span class="card shadow text-decoration-none" style="display: flex; ">
            <div class="card-body" style="justify-content: left;">
                <form class="form-horizontal" action="#" method="POST">
                    <div style="font-size: 16px; margin-bottom: 10px;">Cari Menu</div>
                    <div class="input-group input-group-merge" style="max-width: 400px; margin-bottom: 10px;">
                        <span class="input-group-text" id="basic-addon-search31"><i class="fas fa-search"></i></span>
                        <input type="text" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="basic-addon-search31">
                    </div>
                    <div style="text-align: left; justify-content:space-between">
                        <button type="button" style="padding: 8px 16px; background-color: #28a745; color: #fff; border: none; border-radius: 4px; cursor: pointer;">Cari</button>
                        <a href="{{ route('menu.create') }}" type="button" style="padding: 8px 16px; background-color: #4f60e0; color: #fff; border: none; border-radius: 4px; cursor: pointer;">Tambah</a>
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
            <th>Nama Menu</th>
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
                <td>AAAAAA</td>
                <td>
                    <div style="display: flex; justify-content: center;">
                        <a href="{{ route('menu.update') }}" class="btn btn-primary" style="margin-left: 10px; background-color: rgb(0, 106, 255);">Update</a>
                        <div style="width: 20px;"></div> <!-- Separator -->
                        <a href="#" class="btn btn-primary btn-delete" style="margin-left: 10px; background-color: red;">Delete</a>
                    </div>
                </td>
            </tr>
            <!-- Tambahkan baris sesuai data yang ada -->
    </tbody>
</table>


@endsection

