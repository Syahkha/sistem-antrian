@extends('layouts.index')
@section('title')
Pemanggilan
@endsection
@section('konten')
<div class="main-content" id="main-content" style="min-height: 588px;">

    <section class="section">
  <!-- pesan -->
  @if (Session('msg'))
        <div class="alert alert-success alert-dismissible fade show " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <i class="fa fa-check mx-2"></i>
            <strong>{{Session('msg')}}</strong> </div>
        @endif
        @if ($errors->any())
        @foreach ($errors->all() as $er)
     <div class="alert alert-accent alert-dismissible fade show " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <i class="fa fa-check mx-2"></i>
            <strong>{{$er}}</strong> </div>
            @endforeach
        
        @endif
        <!-- end pesan -->
        <div class="section-header">
            <h1>Pemanggilan Antrian</h1>
          </div>
        <div class="section-body">
            
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Panggilan Baru</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{url('panggil')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Pilih Departemen</label>
                                    <select id="" name="id" required  class="custom-select">
                                        <option selected=""> </option>
                                        @foreach ($dataDep as $item)
                                        <option value="{{$item->id}}">{{$item->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pilih Counter</label>
                                    <select required id="" name="idCounter" class="custom-select">
                                        <option selected=""> </option>
                                        @foreach($loket as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="buttons text-right">
                                    <button type="submit" class="btn btn-lg btn-primary">Panggilan Berikutnya</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Antrian Saat Ini</h4>
                            <div class="card-header-action">
                                <a class="btn btn-primary" href="{{url('restart-antrian')}}">Restart Antrian</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <thead>
                                        <tr>
                                            <th>
                                                No
                                            </th>
                                            <th>Departemen</th>
                                            <th>Nomer Antrian</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1;?>
                                        @foreach ($data as $item)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$item->nama}}</td>
                                            <td>{{$item->letter}} - {{$item->nomer_antrian}}</td>
                                            <td>{{$item->status}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
