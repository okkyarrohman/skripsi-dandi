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
                    @php
                        $i=1;
                        $cetak = "";
                    @endphp
                    @if($mrp->count() > 0)
                        @foreach ($mrp as $mrp)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $mrp->boms->bahan->name }}</td>
                                @php
                                    $bahanId = $mrp->boms->bahan->id;
                                    $jumlahBahan = $jumlahPerBahan->where('bahan_id', $bahanId)->first()->total_jumlah;
                                @endphp
                                @php
                                    $kebutuhan = $jumlahBahan * $mrp->produkJumlah;
                                    $KebutuhanBersih = $mrp->boms->bahan->stokAkhir - $kebutuhan;
                                @endphp
                                <td>{{$KebutuhanBersih}} {{$mrp->boms->satuan}}</td>
                                @php
                                    $status = $mrp->boms->bahan->stokAkhir - $kebutuhan;

                                    if ($status >= 0){
                                        $cetak = "Cukup";
                                    }else{
                                        $cetak = "Tidak Cukup";
                                    }
                                @endphp
                                <td style="white-space: nowrap; overflow: hidden;">{{$cetak}}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="text-center" colspan="4">Dashboard not found</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            @if ($cetak == "Tidak Cukup" || $mrp->count() < 0)

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

            @endif

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
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
      type: 'line',
      data: {
        labels: {!! json_encode($mrp->boms->bahan->pluck('name')) !!},
        datasets: [{
          label: '# Bahan Baku',
          data: {!! json_encode($mrp->boms->bahan->pluck('stokAkhir')) !!},
          borderWidth: 1
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
  </script>




@endsection

