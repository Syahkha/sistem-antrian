@extends('layouts.index')
@section('title')
antrian
@endsection
@section('konten')
<div class="main-content" id="main-content" style="min-height: 588px;">
    <section class="section">
    <div class="section-header">
            <h1>Print Nomer Antrian</h1>
          </div>
        <div class="section-body">
        <h2 class="section-title">Pilih departemen untuk cetak nomer antrian</h2>
            <div class="row">
                @foreach($data as $departement)
                <div class="col-lg-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h2>{{$departement->nama}}</h2>
                        </div>
                        <div class="card-footer text-center">
                        <form action="{{url('buat-antrian')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$departement->id}}">
                        <button type="submit" class="btn btn-primary">Print</button>
                    </form>
                  </div>
                    </div>
                </div>
                @endforeach
            </div> 
    </section>
</div>
@endsection



@section ('js')
<script>
         var button = document.getElementById("nomer"),
             count = 0;
         var nomer = document.getElementById("klik");
         button.onclick = function () {
             count += 1;
             nomer.innerHTML = count;
         };
         </script>
  
@endsection 

@section('print')
    @if(session()->has('namadepartemen'))
        <style>#printarea{display:none;text-align:center}@media print{#main-content,#main-wrapper{display:none}#printarea{display:block;}}@page{margin:0}</style>
        <div id="printarea" style="line-height:1.5">
          
            <span style="font-size:37px; font-weight: bold">{{ session()->get('namadepartemen') }}</span><br>
            <span style="font-size:40px">Nomor antrian anda</span><br>
            <span><h3 style="font-size:70px;font-weight:bold;margin:0;line-height:1.5">{{ session()->get('kode')}} - {{ session()->get('no')}}</h3></span>
            <span style="font-size:40px">Silahkan tunggu panggilan</span><br>
           
          
        </div>
        <script>
            window.onload = function(){window.print();}
        </script>
    @endif
@endsection


