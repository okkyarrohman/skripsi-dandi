@extends('layouts.layout-admin')
@section('content')
<span style="font-size: 25px; ">MATERIAL REQUIREMENT PLANNING</span>
<div class="row" style="margin-top:2%;">
    <div class="w-full">
        <span class="card shadow text-decoration-none" style="display: flex; ">
            <div class="card-body" style="justify-content: left;">
                <!-- resources/views/search.blade.php -->
            <form class="form-horizontal" action="{{ route('mrp.index') }}" method="GET">
                <div class="input-group input-group-merge" style="max-width: 800px; margin-bottom: 10px; display: flex; align-items: center; justify-content: space-between">
                    <div style="flex: 1;">
                        <div style="font-size: 16px; margin-bottom: 10px;">Nama Bahan</div>
                        <select class="form-select" name="bahan_id" id="exampleFormControlSelect1" aria-label="Default select example">
                            <option selected disabled>Pilih Bahan Baku</option>
                            @foreach($bahans as $bahan)
                                <option value="{{ $bahan->id }}">{{ $bahan->name }}</option>
                            @endforeach
                        </select>
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
                    <button type="submit" class="btn  btn-delete" style="background-color: #28a745; color: #fff; border: none; border-radius: 4px; cursor: pointer;">Hitung</button>
                    <a href="#" class="btn  btn-delete" style=" color:white;margin-left: 10px; background-color: red;">Hapus</a>
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
            <th>Nama Bahan</th>
            <th>Kebutuhan Kotor</th>
            <th>Jadwal Penerimaan</th>
            <th>Jumlah Persediaan</th>
            <th>Kebutuhan Bersih</th>
            <th>Kedatangan Pesanan</th>
            <th>Pemesanan</th>
        </tr>
    </thead>
    <!-- Isi tabel -->
    <tbody>
        @php
            $i=1;
        @endphp
        @if($mrp->count() > 0)
            @foreach ($mrp as $mrp)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td style="white-space: nowrap; overflow: hidden;">{{ $mrp->tanggal }}</td>
                    <td>{{ $mrp->boms->bahan->name }}</td>
                    <td>{{$mrp->boms->jumlah}} {{$mrp->boms->satuan}}</td>
                    <td>{{ $mrp->boms->bahan->jadwalPenerimaan }}</td>
                    <td>{{$mrp->boms->bahan->stokAkhir}} {{$mrp->boms->bahan->satuan}}</td>
                    @php
                        $kebutuhanBersih =  $mrp->boms->bahan->stokAkhir - $mrp->boms->jumlah ;
                    @endphp
                    <td>{{$kebutuhanBersih}} {{$mrp->boms->satuan}}</td>
                    <td style="white-space: nowrap; overflow: hidden;">{{ $mrp->boms->bahan->jadwalKedatangan }}</td>
                    <td>{{$mrp->jumlah}} Porsi</td>
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
