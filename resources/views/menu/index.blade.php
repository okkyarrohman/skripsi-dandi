@extends('layouts.layout-admin')
@section('content')
    <span style="font-size: 25px; ">MENU</span>
    <div class="row" style="margin-top:2%;">
        <div class="w-full">
            <span class="card shadow text-decoration-none" style="display: flex; ">
                <div class="card-body" style="justify-content: left;">
                    <form class="form-horizontal" action="{{ route('menu.index') }}" method="GET">
                        <div style="font-size: 16px; margin-bottom: 10px;">Cari Menu</div>
                        <div class="input-group input-group-merge" style="max-width: 400px; margin-bottom: 10px;">
                            <span class="input-group-text" id="basic-addon-search31"><i class="fas fa-search"></i></span>
                            <input name="search" type="text" class="form-control" placeholder="Search..."
                                aria-label="Search..." aria-describedby="basic-addon-search31">
                        </div>
                        <div style="text-align: left; justify-content:space-between">
                            <button type="submit" class="btn  btn-delete"
                                style=" background-color: #28a745; color: #fff; border: none; border-radius: 4px; cursor: pointer;">Cari</button>
                            <a href="{{ route('menu.create') }}" type="button" class="btn  btn-delete"
                                style=" background-color: #4f60e0; color: #fff; border: none; border-radius: 4px; cursor: pointer;">Tambah</a>
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
                $i = 1;
            @endphp
            @if ($menus->count() > 0)
                @foreach ($menus as $menu)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $menu->name }}</td>
                        <td>
                            <div style="display: flex; justify-content: center;">
                                <a href="{{ route('menu.show', ['id' => $menu->id]) }}" class="btn  btn-delete"
                                    style="color:white; margin-left: 10px; background-color: rgb(0, 106, 255);">Update</a>
                                <div style="width: 20px;"></div> <!-- Separator -->
                                 <a href="{{ route('menu.destroy', ['id' => $menu->id]) }}" class="btn btn-delete" style="color:white; margin-left: 10px; background-color: red;">Delete</a> 
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="3">Menu not found</td>
                </tr>
            @endif
        </tbody>

    </table>


@endsection
