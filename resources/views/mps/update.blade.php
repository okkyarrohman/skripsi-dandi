@extends('layouts.layout-admin')
@section('content')
<div class="row">
    <div class="w-full">
        <span class="card shadow text-decoration-none" style="display: flex; ">
            <div class="card-body" style="justify-content: left;">
                <div style="font-size: 24px; margin-bottom: 10px;">Update MPS</div>
                <hr style="border: 1px solid #868181; margin-bottom: 10px;">
                <form class="form-horizontal" action="{{ route('mps.update', ['id' => $mps->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <span>Tanggal</span>
                    <div class="input-group input-group-merge" style="max-width: 400px; margin-bottom: 10px;">
                        <input class="form-control" name="tanggal" type="date" value="{{$mps->tanggal}}" id="html5-date-input">
                    </div>
                    <span>Nama Menu</span>
                    <div class="input-group input-group-merge" style="max-width: 400px; margin-bottom: 10px;">
                        <select class="form-select" name="menu_id" id="exampleFormControlSelect1" aria-label="Default select example">
                            <option value="{{$mps->menus->id}}">{{$mps->menus->name}}</option>
                            @foreach($menus as $menu)
                                <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                            @endforeach
                        </select>

                    </div>
                    <span>Perkiraan Permintaan Harian</span>
                    <div class="input-group input-group-merge" style="max-width: 400px; margin-bottom: 10px;">
                        <input type="text" name="jumlah" value="{{$mps->jumlah}}" class="form-control" id="defaultFormControlInput" placeholder="Masukkan Jumlah" aria-describedby="defaultFormControlHelp">
                    </div>
                    <span>Produksi Harian</span>
                    <div class="input-group input-group-merge" style="max-width: 400px; margin-bottom: 10px;">
                        <input type="text" name="produkJumlah" value="{{$mps->produkJumlah}}" class="form-control" id="defaultFormControlInput" placeholder="Masukkan Jumlah" aria-describedby="defaultFormControlHelp">
                    </div>
                    <div style="text-align: left; justify-content:space-between; margin-top:3%;">
                        <a href="{{ route('mps.index') }}" class="btn  btn-delete" style=" background-color: #fff; color: #4f60e0; border: 1px solid #4f60e0; border-radius: 25px; cursor: pointer; width: 100px; text-align: center; display: inline-block;">Batal</a>
                        <button type="submit" class="btn  btn-delete" style=" background-color: #4f60e0; color: #fff; border: none; border-radius: 25px; cursor: pointer; width: 100px; text-align: center; display: inline-block;">Update</button>
                    </div>
                </form>
            </div>
        </span>
    </div>
</div>


@endsection

