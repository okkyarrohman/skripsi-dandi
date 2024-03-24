@extends('layouts.layout-admin')
@section('content')
<div class="row">
    <div class="col-md-3 mb-4">
        <a href="#" class="card shadow text-decoration-none" style="display: block;">
            <div class="card-body text-center">
                <div style="font-size: 16px; margin-bottom: 10px;">User</div>
                <span id="userSpan" style="font-size: 30px; font-weight: bold; border-radius: 50%;"
                    onmouseout="this.style.border = 'none'; this.style.color = '';">6</span>
            </div>
        </a>
    </div>
    <div class="col-md-3 mb-4">
        <a href="#" class="card shadow text-decoration-none" style="display: block;">
            <div class="card-body text-center">
                <div style="font-size: 16px; margin-bottom: 10px;">Menu</div>
                <span id="menuSpan" style="font-size: 30px; font-weight: bold;"
                    onmouseout="this.style.border = 'none'; this.style.color = '';">16</span>
            </div>
        </a>
    </div>
    <div class="col-md-3 mb-4">
        <a href="#" class="card shadow text-decoration-none" style="display: block;">
            <div class="card-body text-center">
                <div style="font-size: 16px; margin-bottom: 10px;">Bahan</div>
                <span id="bahanSpan" style="font-size: 30px; font-weight: bold; border-radius: 50%;"
                    onmouseout="this.style.border = 'none'; this.style.color = '';">10</span>
            </div>
        </a>
    </div>
    <div class="col-md-3 mb-4">
        <a href="#" class="card shadow text-decoration-none" style="display: block;">
            <div class="card-body text-center">
                <div style="font-size: 16px; margin-bottom: 10px;">Stok Sisa</div>
                <span id="stokSpan" style="font-size: 30px; font-weight: bold; border-radius: 50%;"
                    onmouseout="this.style.border = 'none'; this.style.color = '';">10</span>
            </div>
        </a>
    </div>
</div>


<script>
    function changeColor(id, bgColor, textColor) {
        document.getElementById(id).style.backgroundColor = bgColor;
        document.getElementById(id).style.color = textColor;
    }
</script>




@endsection

