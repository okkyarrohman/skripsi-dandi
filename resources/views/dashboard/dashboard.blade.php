@extends('layouts.layout-admin')
@section('content')
<span style="font-size: 25px; ">DASHBOARD</span>
<div class="row d-flex justify-content-center" style="margin-top:2%;">
    <div class="col-md-3 mb-4">
        <a href="{{route('menu.index')}}" class="card shadow text-decoration-none" style="display: block;">
            <div class="card-body text-center">
                <div style="font-size: 16px; margin-bottom: 10px;">Menu</div>
                <span id="menuSpan" style="font-size: 30px; font-weight: bold;"
                    onmouseout="this.style.border = 'none'; this.style.color = '';">{{$jumlahMenu}}</span>
            </div>
        </a>
    </div>
    <div class="col-md-3 mb-4">
        <a href="{{route('bahan.index')}}" class="card shadow text-decoration-none" style="display: block;">
            <div class="card-body text-center">
                <div style="font-size: 16px; margin-bottom: 10px;">Bahan</div>
                <span id="bahanSpan" style="font-size: 30px; font-weight: bold; border-radius: 50%;"
                    onmouseout="this.style.border = 'none'; this.style.color = '';">{{$jumlahBahan}}</span>
            </div>
        </a>
    </div>
</div>

<div class="card text-decoration-none shadow" style="margin-top:2%; padding:10px;">
    <div class="row">
        <div class="col-6 " style="text-align: center;">
            <span style="font-size:150%;">Grafik Stok Bahan Baku</span>
            <div>
                <canvas id="myChart"></canvas>
            </div>
        </div>
        <div class="col-6" style="text-align: center;">
            <span style="font-size:150%;">Diagram Stok Bahan Baku</span>
            <table id="table-register" class="table table-bordered table-hover" style="margin-top: 5%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Bahan</th>
                        <th>Jumlah Tersisa</th>
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
                            <td>{{ $v->bahan->name }}</td>
                            @php
                                $Bersih =  $v->bahan->stokAkhir - $value->jumlah * $v->jumlah
                            @endphp
                            <td>{{ $Bersih }}</td>
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
            {{-- @if ($cetak == "Tidak Cukup" || $mrp->count() < 0)

                @else

                @if ($mrp->count() > 0)
                    <div style="margin-top:3%; display: flex; justify-content: space-between;">
                        <i class="fa-solid fa-triangle-exclamation" style="font-size:150%; align-self: center;"></i>
                        <div style="margin-left: 10px; text-align: left; font-size:14px;">
                        <span >Perhatian: Stok bahan baku hampir habis. Mohon segera lakukan pembelian kembali agar aktivitas produksi tidak terganggu.</span>
                        </div>
                    </div>
                    <div style="margin-top:3%; display: flex; justify-content: space-between;">
                        <i class="fa-solid fa-info-circle" style="font-size:150%; align-self: center;"></i>
                        <div style="text-align: left; flex-grow: 1; margin-left: 6px;">
                            Produksi minggu ini melampaui target!
                        </div>
                    </div>
                @endif

            @endif --}}

        </div>
    </div>
</div>


<script>
    function changeColor(id, bgColor, textColor) {
        document.getElementById(id).style.backgroundColor = bgColor;
        document.getElementById(id).style.color = textColor;
    }
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('myChart').getContext('2d');

        const labels = [];
        const data = [];

        @foreach ($mps as $key => $value)
            @foreach ($value->menus->boms as $k => $v)
                // Mengumpulkan data
                @php
                    $Bersih =  $v->bahan->stokAkhir - $value->jumlah * $v->jumlah
                @endphp
                labels.push({!! json_encode($v->bahan->name) !!});
                data.push({!! json_encode($Bersih) !!});
            @endforeach
        @endforeach

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: '# Bahan Baku',
                    data: data,
                    borderWidth: 1,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>





@endsection

