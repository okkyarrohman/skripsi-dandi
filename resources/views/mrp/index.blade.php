@extends('layouts.layout-admin')
@section('content')
    <span style="font-size: 25px; ">MATERIAL REQUIREMENT PLANNING</span>
    <div class="row" style="margin-top:2%;">
        <div class="w-full">
            <span class="card shadow text-decoration-none" style="display: flex; ">
                <div class="card-body" style="justify-content: left;">
                    <!-- resources/views/search.blade.php -->
                    <form class="form-horizontal" action="{{ route('mrp.result') }}" method="POST" >
                        @csrf
                        <div class="input-group input-group-merge"
                            style="max-width: 800px; margin-bottom: 10px; display: flex; align-items: center; justify-content: space-between">
                            <div style="flex: 1;">
                                <div style="font-size: 16px; margin-bottom: 10px;">Nama Bahan</div>
                                <select class="form-select" name="bahan_id" id="exampleFormControlSelect1"
                                    aria-label="Default select example">
                                    <option value="">Pilih Bahan</option>
                                    @foreach ($boms->unique('bahan.name') as $bom)
                                        <option value="{{ $bom->bahan->id }}">{{ $bom->bahan->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div style="margin: 0 4px;"></div>
                            <div style="flex: 1;">
                                <div style="font-size: 16px; margin-bottom: 10px;">Tanggal awal</div>
                                <input name="dateStart" class="form-control" type="date" value=""
                                    id="html5-date-input">
                            </div>
                            <div style="margin: 0 4px;"></div>
                            <div style="flex: 1;">
                                <div style="font-size: 16px; margin-bottom: 10px;">Tanggal akhir</div>
                                <input name="dateEnd" class="form-control" type="date" value=""
                                    id="html5-date-input">
                            </div>
                        </div>
                        <div style="text-align: left; justify-content:space-between">
                            <button type="submit" class="btn  btn-delete"
                                style="background-color: #28a745; color: #fff; border: none; border-radius: 4px; cursor: pointer;">Hitung</button>
                            <a href="{{ route('mrp.print') }}" class="btn  btn-delete"
                                style=" color:white;margin-left: 10px; background-color: red;">Cetak</a>
                        </div>
                    </form>
                </div>
            </span>
        </div>
    </div>
    <table id="table-register" class="table table-bordered table-hover" style="margin-top: 5%; margin-bottom:2%;">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Bahan</th>
                <th>Kebutuhan Kotor (GR)</th>
                <th>Jadwal Penerimaan (SR)</th>
                <th>Jumlah Persediaan (OHI)</th>
                <th>Kebutuhan Bersih (NR)</th>
                <th>Pemesanan</th>
                <th>Status</th>
            </tr>
        </thead>
        <!-- Isi tabel -->
        <tbody>
            @if ($mps->count() > 0)
                @php
                    $no = 1
                @endphp
                @foreach ($mps as $key => $value)
                    @foreach ($value->menus->boms as $k => $v)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $value->tanggal }}</td>
                            <td>{{ $v->bahan->name }}</td>
                            @php
                                $jum =  $value->jumlah * $v->produkJumlah
                            @endphp
                            <td>{{ $jum }} {{ $v->satuan }}</td>
                            <td>0</td>
                            <td>{{ $v->bahan->stokAkhir }} {{ $v->satuan }}</td>
                            @php
                                $Bersih =  $v->bahan->stokAkhir - 0 -  $jum
                            @endphp
                            <td>{{ $Bersih }} {{ $v->satuan }}</td>
                            <td>{{ $v->produkJumlah }} Porsi</td>
                            @php
                                if ($Bersih < 0) {
                                    $cetak = "Tidak Cukup";
                                }else {
                                    $cetak = "Cukup";
                                };
                            @endphp
                            <td>{{ $cetak }}</td>
                        </tr>
                    @endforeach
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="10">Mrp not found</td>
                </tr>
            @endif
        </tbody>
    </table>
    {{-- @if ($cetak == 'Tidak Cukup' || $mrp->count() < 0)
    @else
        @if ($mrp->count() > 0)
            <div style="margin-top:3%; display: flex; justify-content: space-between;">
                <i class="fa-solid fa-triangle-exclamation" style="font-size:200%; align-self: center;"></i>
                <div style="margin-left: 10px;">
                    <span>Perhatian! Terdapat bahan baku yang kurang untuk memenuhi kebutuhan produksi pada rentang waktu
                        tertentu. Mohon untuk segera mengambil tindakan yang diperlukan untuk memastikan kelancaran proses
                        produksi!</span>
                </div>
            </div>
        @endif
    @endif --}}


@endsection
