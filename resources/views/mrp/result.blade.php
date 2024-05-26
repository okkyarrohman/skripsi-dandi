<table id="table-register" class="table table-bordered table-hover" style="margin: 5% auto; width: 80%; border: 1px solid #000; border-collapse: collapse;">
    <thead>
        <tr>
            <th colspan="10" style="text-align: center; border: 1px solid #000;">DATA MRP RESULT</th>
        </tr>
        <tr>
            <th style="border: 1px solid #000;">No</th>
            <th style="border: 1px solid #000;">Tanggal</th>
            <th style="border: 1px solid #000;">Nama Bahan</th>
            <th style="border: 1px solid #000;">Kebutuhan Kotor</th>
            <th style="border: 1px solid #000;">Jadwal Penerimaan</th>
            <th style="border: 1px solid #000;">Jumlah Persediaan</th>
            <th style="border: 1px solid #000;">Kebutuhan Bersih</th>
            <th style="border: 1px solid #000;">Pemesanan</th>
            <th style="border: 1px solid #000;">Status</th>
        </tr>
    </thead>
    <tbody>

        @if($mps->count() > 0)
        @php
            $no = 1
        @endphp
        @foreach ($mps as $key => $value)
            @foreach ($value->menus->boms as $k => $v)
                <tr>
                    <td style="border: 1px solid #000;">{{ $no++ }}</td>
                    <td style="border: 1px solid #000;">{{ $value->tanggal }}</td>
                    <td style="border: 1px solid #000;">{{ $v->bahan->name }}</td>
                    <td style="border: 1px solid #000;">{{ $v->jumlah }} {{ $v->satuan }}</td>
                    <td style="border: 1px solid #000;">{{ $v->bahan->jadwalPenerimaan }}</td>
                    <td style="border: 1px solid #000;">{{ $v->bahan->stokAkhir }}</td>
                    @php
                        $Bersih =  $v->bahan->stokAkhir - $value->jumlah * $v->jumlah
                    @endphp
                    <td style="border: 1px solid #000;">{{ $Bersih }}</td>
                    <td style="border: 1px solid #000;">{{ $value->jumlah }} Porsi</td>
                    @php
                        if ($Bersih < 0) {
                            $cetak = "Tidak Cukup";
                        }else {
                            $cetak = "Cukup";
                        };
                    @endphp
                    <td style="border: 1px solid #000;">{{ $cetak }}</td>
                </tr>
            @endforeach
        @endforeach
        @else
            <tr>
                <td class="text-center" colspan="10" style="border: 1px solid #000;">Data MRP tidak ditemukan</td>
            </tr>
        @endif
    </tbody>
</table>
<script>
    window.onload = function() {
        window.print();
    }
</script>
