<table id="table-register" class="table table-bordered table-hover" style="margin: 5% auto; width: 80%; border: 1px solid #000; border-collapse: collapse;">
    <thead>
        <tr>
            <th colspan="10" style="text-align: center; border: 1px solid #000;">DATA MRP RESULT</th>
        </tr>
        <tr>
            <th style="border: 1px solid #000;">No</th>
            <th style="border: 1px solid #000;">Tanggal</th>
            <th style="border: 1px solid #000;">Nama Menu</th>
            <th style="border: 1px solid #000;">Nama Bahan</th>
            <th style="border: 1px solid #000;">Kebutuhan Kotor (GR)</th>
            <th style="border: 1px solid #000;">Jadwal Penerimaan (SR)</th>
            <th style="border: 1px solid #000;">Jumlah Persediaan (OHI)</th>
            <th style="border: 1px solid #000;">Kebutuhan Bersih (NR)</th>
            <th style="border: 1px solid #000;">Pemesanan</th>
            <th style="border: 1px solid #000;">Status</th>
        </tr>
    </thead>
    <tbody>

        @php
            $notif = 0;
        @endphp
        @if (count($data) > 0)
        @foreach ($data as $key => $value)
            <tr>
                <td style="border: 1px solid #000;">{{ $key + 1 }}</td>
                <td style="border: 1px solid #000;">{{ $value['tanggal'] }}</td>
                <td style="border: 1px solid #000;">{{ $value['menu'] }}</td>
                <td style="border: 1px solid #000;">{{ $value['name'] }}</td>
                <td style="border: 1px solid #000;">{{ $value['jumlahBahan'] }}</td>
                <td style="border: 1px solid #000;">{{ $value['jadwalPenerimaan'] }}</td>
                <td style="border: 1px solid #000;">{{ $value['stokAkhir'] }}</td>
                <td style="border: 1px solid #000;">{{ $value['Bersih'] }}</td>
                <td style="border: 1px solid #000;">{{ $value['jumlah'] }} Porsi</td>
                <td style="border: 1px solid #000;">
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
<script>
    window.onload = function() {
        window.print();
    }
</script>
