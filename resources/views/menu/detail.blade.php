@extends('layouts.layout-admin')
@section('content')
<div class="row">
    <div class="w-full">
        <span class="card shadow text-decoration-none" style="display: flex; ">
            <div class="card-body" style="justify-content: left; display: flex; align-items: center;">
                <div style="flex-grow: 1; display: flex; justify-content: space-between;">
                    <div style="width: 60%;">
                        <div style="font-size: 24px; margin-bottom: 10px;">Detail Menu</div>
                        <hr style="border: 1px solid #868181; margin-bottom: 10px;">
                        <form class="form-horizontal" action="#" method="POST">
                            <div style="font-size: 16px; margin-bottom: 10px;">Nama</div>
                            <div class="input-group input-group-merge" style="max-width: 400px; margin-bottom: 10px;">
                                <input type="text" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp">
                            </div>
                            <div style="font-size: 16px; margin-bottom: 10px;">Harga</div>
                            <div class="input-group input-group-merge" style="max-width: 400px; margin-bottom: 10px;">
                                <input type="text" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp">
                            </div>
                            <div style="font-size: 16px; margin-bottom: 10px;">Deskripsi</div>
                            <div class="input-group input-group-merge" style="max-width: 400px; margin-bottom: 10px;">
                                <textarea type="text" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp"></textarea>
                            </div>
                            <div style="font-size: 16px; margin-bottom: 10px;">Upload foto</div>
                            <div class="input-group input-group-merge" style="max-width: 400px; margin-bottom: 10px;">
                                <input type="file" class="form-control" id="inputGroupFile02">
                            </div>

                            <div style="text-align: left; justify-content:space-between; margin-top:3%;">
                                <a href="{{ route('menu.index') }}" class="btn  btn-delete" style="background-color: #fff; color: #4f60e0; border: 1px solid #4f60e0; border-radius: 25px; cursor: pointer; width: 100px; text-align: center; display: inline-block;">Batal</a>
                                <button type="submit" class="btn  btn-delete" style="background-color: #4f60e0; color: #fff; border: none; border-radius: 25px; cursor: pointer; width: 100px; text-align: center; display: inline-block;">Update</button>
                            </div>
                        </form>
                    </div>
                    <div style="width: 40%; display: flex; justify-content: flex-end; align-items: center;">
                        <img src="{{asset('assets/img/pages/jkt.jpeg')}}" alt="Gambar Kanan" style="max-width: 100%; margin-left: 20px;">
                    </div>
                </div>



            </div>
        </span>
    </div>
</div>


@endsection

