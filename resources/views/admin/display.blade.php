@extends('layouts.index')
@section('title')
Display
@endsection
@section('konten')
<div class="main-content" style="min-height: 588px;">
    <section class="section">
    <div class="section-header">
            <h1>Display</h1>
          </div>
        <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                        @foreach ($data as $item)
                            <h1 class="text-center">Nomor Antrian</h1>
                            <br>
                            <div class="display-1 text-center"><strong>{{ $item->letter }} - {{ $item->nomer_antrian }} </strong></div>
                            <br>
                            <h1 class="text-center">Silahkan Ke Counter</h1>
                            <br>
                            <div class="display-1 text-center"><strong>{{$item->name}}</strong></div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
