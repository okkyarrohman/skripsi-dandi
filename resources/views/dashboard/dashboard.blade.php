@extends('layouts.layout-admin')
@section('content')
<span style="font-size: 25px; ">DASHBOARD</span>
<!-- Running Text -->
<marquee style="width: 100%; font-size: 35px; font-weight: bold; background-color: #f8f9fa; padding: 10px; margin-top: 20px;">
    Welcome to the BarbarSync! Manage your menus and ingredients easily.
</marquee>
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



<!-- Image Display Below Cards -->
<div class="row d-flex justify-content-center" style="margin-top: 20px;">
    <div class="col-md-6">
        <img src="{{ asset('foto/foto123.jpg') }}" alt="Dashboard Image" style="width: 100%; height: auto; border-radius: 10px;">
    </div>
</div>


<!-- Resizing Script -->
<script>
    window.addEventListener('resize', function() {
        let marquee = document.querySelector('marquee');
        if (window.innerWidth < 768) {
            marquee.style.fontSize = '16px';
        } else {
            marquee.style.fontSize = '20px';
        }
    });
</script>

@endsection
