<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\Bom;
use App\Models\Menu;
use App\Models\Mps;
use App\Models\Mrp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MrpController extends Controller
{
    public function index(Request $request)
    {

        return view('mrp.index', [
            'mps' => Mps::get(),
            'boms' => Bom::get(),
        ]);
    }
    public function result(Request $request)
    {
        $mrp = Mrp::create([
            'bahan_id' => $request->input('bahan_id'),
            'dateStart' => $request->input('dateStart'),
            'dateEnd' => $request->input('dateEnd'),
        ]);
        return redirect()->route('mrp.hasil', $mrp->id)->with('success', 'MRP berhasil disimpan.');
    }

    public function hasil($id)
    {
        $mrp = Mrp::find($id);

        $mps = Mps::whereBetween('tanggal', [$mrp->dateStart, $mrp->dateEnd])->get();
        $data = [];
        $index = 0;
        foreach ($mps as $key => $value) {
            foreach ($value->menus->boms as $k => $v) {
                if ($v->bahan->id == $mrp->bahan_id) {
                    $data[$index]['tanggal'] = $value->tanggal;
                    $data[$index]['name'] = $v->bahan->name;
                    $jum = $value->produkJumlah * $v->jumlah;
                    $data[$index]['jumlahBahan'] = $jum . ' ' . $v->satuan;
                    $data[$index]['jadwalPenerimaan'] = 0;
                    $data[$index]['stokAkhir'] = $v->bahan->stokAkhir. ' ' . $v->satuan;
                    $Bersih =  $v->bahan->stokAkhir - 0 -  $jum;
                    $data[$index]['Bersih'] = $Bersih. ' ' . $v->satuan;
                    $data[$index]['jumlah'] = $value->produkJumlah;
                    if ($Bersih < 0) {
                        $cetak = "Tidak Cukup";
                    } else {
                        $cetak = "Cukup";
                    };
                    $data[$index]['cetak'] = $cetak;
                    $index++;
                }
            }
        }

        return view('mrp.hasil', ['data' => $data, 'mrp' => $mrp]);
    }

    public function print(Request $request)
    {

        return view('mrp.result', [
            'mps' => Mps::get(),
            'boms' => Bom::get(),
        ]);
    }

    public function printHasil($id){
        $mrp = Mrp::find($id);

        $mps = Mps::whereBetween('tanggal', [$mrp->dateStart, $mrp->dateEnd])->get();
        $data = [];
        $index = 0;
        foreach ($mps as $key => $value) {
            foreach ($value->menus->boms as $k => $v) {
                if ($v->bahan->id == $mrp->bahan_id) {
                    $data[$index]['tanggal'] = $value->tanggal;
                    $data[$index]['name'] = $v->bahan->name;
                    $jum = $value->produkJumlah * $v->jumlah;
                    $data[$index]['jumlahBahan'] = $jum . ' ' . $v->satuan;
                    $data[$index]['jadwalPenerimaan'] = 0;
                    $data[$index]['stokAkhir'] = $v->bahan->stokAkhir. ' ' . $v->satuan;
                    $Bersih =  $v->bahan->stokAkhir - 0 -  $jum;
                    $data[$index]['Bersih'] = $Bersih. ' ' . $v->satuan;
                    $data[$index]['jumlah'] = $value->produkJumlah;
                    if ($Bersih < 0) {
                        $cetak = "Tidak Cukup";
                    } else {
                        $cetak = "Cukup";
                    };
                    $data[$index]['cetak'] = $cetak;
                    $index++;
                }
            }
        }

        return view('mrp.printHasil', ['data' => $data, 'mrp' => $mrp]);
    }
}
