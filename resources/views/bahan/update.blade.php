@extends('layouts.layout-admin')
@section('content')
<div class="row">
    <div class="w-full">
        <span class="card shadow text-decoration-none" style="display: flex; ">
            <div class="card-body" style="justify-content: left;">
                <form class="form-horizontal" action="#" method="POST">
                    <div style="font-size: 16px; margin-bottom: 10px;">Update Bahan</div>
                    <div class="input-group input-group-merge" style="max-width: 400px; margin-bottom: 10px;">
                        <input type="text" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp">
                    </div>
                    <div style="text-align: left; justify-content:space-between">
                        <button type="submit" style="padding: 8px 16px; background-color: #4f60e0; color: #fff; border: none; border-radius: 4px; cursor: pointer;">Simpan</button>
                    </div>
                </form>
            </div>
        </span>
    </div>
</div>


@endsection

