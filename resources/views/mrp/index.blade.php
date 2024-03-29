@extends('layouts.layout-admin')
@section('content')
<span style="font-size: 25px; ">MATERIAL REQUIREMENT PLANNING</span>
<div class="row" style="margin-top:2%;">
    <div class="w-full">
        <span class="card shadow text-decoration-none" style="display: flex; ">
            <div class="card-body" style="justify-content: left;">
                <form class="form-horizontal" action="#" method="POST">
                    {{-- <div style="font-size: 20px; margin-bottom: 10px;">Cari MPS</div> --}}
                    <div class="input-group input-group-merge" style="max-width: 800px; margin-bottom: 10px; display: flex; align-items: center;justify-content:space-between">
                        <div style="flex: 1;">
                            <div style="font-size: 16px; margin-bottom: 10px;">Nama Bahan</div>
                            <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                                <option selected="">Pilih Bahan Baku</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div style="margin: 0 4px;"></div>
                        <div style="flex: 1;">
                            <div style="font-size: 16px; margin-bottom: 10px;">Tanggal awal</div>
                            <input class="form-control" type="date" value="2021-06-18" id="html5-date-input">
                        </div>
                        <div style="margin: 0 4px;"></div>
                        <div style="flex: 1;">
                            <div style="font-size: 16px; margin-bottom: 10px;">Tanggal akhir</div>
                            <input class="form-control" type="date" value="2021-06-18" id="html5-date-input">
                        </div>
                    </div>
                    <div style="text-align: left; justify-content:space-between">
                        <a href="{{route('mrp.result')}}" class="btn  btn-delete" style="background-color: #28a745; color: #fff; border: none; border-radius: 4px; cursor: pointer;">Hitung</a>
                        <a href="#" class="btn  btn-delete" style=" color:white;margin-left: 10px; background-color: red;">Hapus</a>
                    </div>
                </form>
            </div>
        </span>
    </div>
</div>

@endsection
