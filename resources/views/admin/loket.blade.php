@extends('layouts.index')
@section('title')
LOKET
@endsection
@section('konten')

<div class="main-content" style="min-height: 588px;">
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
        <div class="row">
            
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>DATA COUNTER</h4>
                        <div class="card-header-action">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahloket">Tambah
                                Counter</button>
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
                                        <th>Nama Counter</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1;?>
                                    @foreach ($data as $item)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>
                                            <a class="btn btn-primary btn-action mr-1" data-toggle="modal" title=""
                                                data-target="#U{{$item->id}}" data-original-title="Edit"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                            <a onclick="return confirm('hapus data?')"
                                                href="{{url('hapus-loket').'/'.$item->id}}"
                                                class="btn btn-danger btn-action trigger--fire-modal-1 "><i
                                                    class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>


    </section>
    <!--  -->
    <div class="modal fade" id="tambahloket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Loket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">


                    <div class="card-body">


                        <form action="{{url('tambah-loket')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="position-relative form-group">
                                <label for="" class="">Nama Loket</label>

                                <input name="nama_loket" required id="" type="text" placeholder="Tulis nama loket"
                                    class="form-control"></div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>

                </div>


            </div>
        </div>
    </div>
    @foreach ($data as $item)
    <div class="modal fade" id="U{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Loket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">


                    <div class="card-body">


                        <form action="{{url('update-loket')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="position-relative form-group">
                                <label for="" class="">Nama Loket</label>
                                <input type="hidden" name="id" value="{{$item->id}}">
                                <input name="nama_loket" required id="" type="text" value="{{$item->name}}"
                                    placeholder="Tulis nama loket" class="form-control"></div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>

                </div>


            </div>
        </div>
    </div>
    @endforeach

</div>
    @endsection
