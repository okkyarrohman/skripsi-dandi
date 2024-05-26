@extends('layouts.layout-admin')
@section('content')
    <span style="font-size: 25px; ">MATERIAL REQUIREMENT PLANNING</span>
    <div class="row" style="margin-top:2%;">
        <div class="w-full">
            <span class="card shadow text-decoration-none" style="display: flex; ">
                <div class="card-body" style="justify-content: left;">
                    <!-- resources/views/search.blade.php -->
                    <div class="input-group input-group-merge"
                        style="max-width: 800px; margin-bottom: 10px; display: flex; align-items: center; justify-content: space-between">
                        <div style="flex: 1;">
                            <div style="font-size: 16px; margin-bottom: 10px;">Nama Bahan</div>
                            <div class="input-group input-group-merge" style="max-width: 400px; margin-bottom: 10px;">
                                <input type="text" name="bahan_id" value="{{ $mrp->bahan->name }}" class="form-control"
                                    id="defaultFormControlInput" placeholder="Masukkan Jumlah"
                                    aria-describedby="defaultFormControlHelp">
                            </div>
                        </div>
                        <div style="margin: 0 4px;"></div>
                        <div style="flex: 1;">
                            <div style="font-size: 16px; margin-bottom: 10px;">Tanggal awal</div>
                            <input name="dateStart" class="form-control" type="date" value="{{ $mrp->dateStart }}"
                                id="html5-date-input">
                        </div>
                        <div style="margin: 0 4px;"></div>
                        <div style="flex: 1;">
                            <div style="font-size: 16px; margin-bottom: 10px;">Tanggal akhir</div>
                            <input name="dateEnd" class="form-control" type="date" value="{{ $mrp->dateEnd }}"
                                id="html5-date-input">
                        </div>
                    </div>
                    <div style="text-align: left; justify-content:space-between">
                        <a href="{{ route('mrp.index') }}" class="btn  btn-delete"
                            style=" color:white;margin-left: 10px; background-color: rgb(0, 157, 255);">Back</a>
                        <a href="{{ route('mrp.printHasil', ['id' => $mrp->id]) }}" class="btn  btn-delete"
                            style=" color:white;margin-left: 10px; background-color: red;">Cetak</a>
                    </div>
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
                <th>Kebutuhan Kotor</th>
                <th>Jadwal Penerimaan</th>
                <th>Jumlah Persediaan</th>
                <th>Kebutuhan Bersih</th>
                <th>Pemesanan</th>
                <th>Status</th>
            </tr>
        </thead>
        <!-- Isi tabel -->
        <tbody>

                @php
                    $notif = 0;
                @endphp
                @if (count($data) > 0)
                @foreach ($data as $key => $value)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $value['tanggal'] }}</td>
                        <td>{{ $value['name'] }}</td>
                        <td>{{ $value['jumlahBahan'] }}</td>
                        <td>{{ $value['jadwalPenerimaan'] }}</td>
                        <td>{{ $value['stokAkhir'] }}</td>
                        <td>{{ $value['Bersih'] }}</td>
                        <td>{{ $value['jumlah'] }} Porsi</td>
                        <td>
                            {{ $value['cetak'] }}
                            @php
                                if ($value['cetak'] == 'Tidak Cukup') {
                                    $notif = 1;
                                }
                            @endphp
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="10">Mrp not found</td>
                </tr>
            @endif



        </tbody>
    </table>
    @if ($notif)
        <div style="margin-top:3%; display: flex; justify-content: space-between;">
            <i class="fa-solid fa-triangle-exclamation" style="font-size:200%; align-self: center;"></i>
            <div style="margin-left: 10px;">
                <span>Perhatian! Terdapat bahan baku yang kurang untuk memenuhi kebutuhan produksi pada rentang waktu
                    tertentu. Mohon untuk segera mengambil tindakan yang diperlukan untuk memastikan kelancaran proses
                    produksi!</span>
            </div>
        </div>
    @endif
@endsection
