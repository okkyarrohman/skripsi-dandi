@extends('layouts.layout-admin')
@section('content')
<span style="font-size: 25px; ">MASTER PRODUCTION SCHEDULE</span>
<div class="row" style="margin-top:2%;">
    <div class="w-full">
        <span class="card shadow text-decoration-none" style="display: flex; ">
            <div class="card-body" style="justify-content: left;">
                <form class="form-horizontal" action="{{ route('mps.index') }}" method="GET">
                    <div class="input-group input-group-merge" style="max-width: 800px; margin-bottom: 10px; display: flex; align-items: center;">
                        <div style="flex: 1;">
                            <div style="font-size: 16px; margin-bottom: 10px;">Cari MPS</div>
                                <div class="input-group input-group-merge">
                                    <select class="form-select" name="bom_id" id="exampleFormControlSelect1" aria-label="Default select example">
                                        <option value="">Pilih Menu</option>
                                        @foreach($boms->unique('menu.name') as $bom)
                                            <option value="{{ $bom->id }}">{{ $bom->menu->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                        <div style="margin: 0 4px;"></div>
                        <div style="flex: 1;">
                            <div style="font-size: 16px; margin-bottom: 10px;">Tanggal awal</div>
                            <input name="tanggal_awal" class="form-control" type="date" value="" id="html5-date-input">
                        </div>
                        <div style="margin: 0 4px;"></div>
                        <div style="flex: 1;">
                            <div style="font-size: 16px; margin-bottom: 10px;">Tanggal akhir</div>
                            <input name="tanggal_akhir" class="form-control" type="date" value="" id="html5-date-input">
                        </div>
                    </div>
                    <div style="text-align: left; justify-content:space-between">
                        <button type="submit" class="btn btn-delete" style="background-color: #28a745; color: #fff; border: none; border-radius: 4px; cursor: pointer;">Cari</button>
                        <a href="{{ route('mps.create') }}" class="btn btn-delete" type="button" style="background-color: #4f60e0; color: #fff; border: none; border-radius: 4px; cursor: pointer;">Tambah</a>
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
            <th>Perkiraan Permintaan Harian</th>
            <th>Jumlah Produksi</th>
            <th style="text-align: center;">Action</th>
        </tr>
    </thead>
    <!-- Isi tabel -->
    <tbody>
        @php
            $i=1;
        @endphp
        @if($mps->count() > 0)
            @foreach ($mps as $mps)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $mps->tanggal }}</td>
                    {{-- <td>{{ $mergedMenus->where('id', $mps->menu_id)->first()->name }}</td> --}}
                    <td>{{$mps->boms->menu->name}}</td>
                    <td>{{ $mps->jumlah }} Porsi</td>
                    <td>{{ $mps->produkJumlah}} Porsi</td>
                    <td>
                        <div style="display: flex; justify-content: center;">
                            <a href="{{ route('mps.show', ['id' => $mps->id]) }}" class="btn  btn-delete" style="color:white; margin-left: 10px; background-color: rgb(0, 106, 255);">Update</a>
                            <div style="width: 20px;"></div> <!-- Separator -->
                            <a href="{{ route('mps.destroy', ['id' => $mps->id]) }}" class="btn btn-delete" style="color:white; margin-left: 10px; background-color: red;">Delete</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td class="text-center" colspan="6">Mps not found</td>
            </tr>
        @endif
    </tbody>
</table>



@endsection

