@extends('layouts.layout-admin')
@section('content')
<span style="font-size: 25px; ">RIWAYAT PERHITUNGAN MRP</span>
<table id="table-register" class="table table-bordered table-hover" style="margin-top: 3%;">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Bahan</th>
            <th>Tanggal Awal</th>
            <th>Tanggal Akhir</th>
        </tr>
    </thead>
    <!-- Isi tabel -->
    <tbody>
        @php
            $i=1;
        @endphp
        @if($mrp->count() > 0)
            @foreach ($mrp as $item)
                @if ($item->bahan_id !== null && $item->dateStart !== null && $item->dateEnd !== null)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->bahan->name }}</td>
                        <td>{{ $item->dateStart }}</td>
                        <td>{{ $item->dateEnd }}</td>
                    </tr>
                @endif
            @endforeach
        @else
            <tr>
                <td class="text-center" colspan="6">Data riwayat perhitungan not found</td>
            </tr>
        @endif
    </tbody>
</table>



@endsection

