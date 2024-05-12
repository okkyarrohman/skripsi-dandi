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
            <th style="border: 1px solid #000;">Kedatangan Pesanan</th>
            <th style="border: 1px solid #000;">Pemesanan</th>
            <th style="border: 1px solid #000;">Status</th>
        </tr>
    </thead>
    <tbody>
        @php $i=1; @endphp
        @if($mrp->count() > 0)
            @foreach ($mrp as $mrpItem)
                <tr>
                    <td style="border: 1px solid #000;">{{ $i++ }}</td>
                    <td style="border: 1px solid #000;">{{ $mrpItem->tanggal }}</td>
                    <td style="border: 1px solid #000;">{{ $mrpItem->boms->bahan->name }}</td>
                    @php
                        $bahanId = $mrpItem->boms->bahan->id;
                        $jumlahBahan = $jumlahPerBahan->where('bahan_id', $bahanId)->first()->total_jumlah;
                    @endphp
                    <td style="border: 1px solid #000;">{{ $jumlahBahan }} {{ $mrpItem->boms->satuan }}</td>
                    <td style="border: 1px solid #000;">{{ $mrpItem->boms->bahan->jadwalPenerimaan }}</td>
                    <td style="border: 1px solid #000;">{{ $mrpItem->boms->bahan->stokAkhir }} {{ $mrpItem->boms->bahan->satuan }}</td>
                    @php
                        $kebutuhan = $jumlahBahan * $mrpItem->produkJumlah;
                        $kebutuhanBersih = $mrpItem->boms->bahan->stokAkhir - $kebutuhan;
                    @endphp
                    <td style="border: 1px solid #000;">{{ $kebutuhanBersih }} {{ $mrpItem->boms->satuan }}</td>
                    <td style="border: 1px solid #000;">{{ $mrpItem->boms->bahan->jadwalKedatangan }}</td>
                    <td style="border: 1px solid #000;">{{ $mrpItem->jumlah }} Porsi</td>
                    @php
                        $status = $mrpItem->boms->bahan->stokAkhir - $kebutuhan;
                        $cetak = $status >= 0 ? "Cukup" : "Tidak Cukup";
                    @endphp
                    <td style="border: 1px solid #000;">{{ $cetak }}</td>
                </tr>
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
