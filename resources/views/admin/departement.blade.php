@extends('layouts.index')
@section('title')
Departement
@endsection
@section('konten')
<div class="main-content" style="min-height: 588px;">
    <section class="section">
        @if (Session('msg'))
        <div class="alert alert-primary alert-dismissible" role="alert">
            <p align="center">{{Session('msg')}}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        @endif
        @if ($errors->any())
        @foreach ($errors->all() as $er)
        <ul>
            <div class="alert alert-primary alert-dismissible" role="alert">
                <li>{{$er}}</li>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
            </div>
            @endforeach
        </ul>
        @endif
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>DATA DEPARTEMENT</h4>
                            <div class="card-header-action">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#add">Tambah Departement
                                    </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>
                                                No
                                            </th>
                                            <th>Nama</th>
                                            <th>letter</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1;?>
                                        @foreach ($data as $item)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$item->nama}}</td>
                                            <td>{{$item->letter}}</td>
                                            <td>
                                                <a class="btn btn-primary btn-action mr-1" data-toggle="modal" title=""
                                                    data-target="#up{{$item->id}}" data-original-title="Edit"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                <a onclick="return confirm('hapus data?')"
                                                    href="{{url('hapus-departement').'/'.$item->id}}"
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
        </div>
    </section>
    <!-- tambah -->
    <div class="modal fade" tabindex="-1" role="dialog" id="add" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{url('tambah-departement')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" required name="nama" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Letter</label>
                            <input type="text" required name="letter" id="" class="form-control">
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- end tambah-->
    <!-- edit -->
    @foreach ($data as $item)
    <div class="modal fade" tabindex="-1" role="dialog" id="up{{$item->id}}" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{url('up-departement')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama </label>
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <input type="text" required name="nama" id="" value="{{$item->nama}}" class=" form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Letter </label>
                            <input type="text" name="letter" required id="" value="{{$item->letter}}" class=" form-control">
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    @endforeach
    <!-- end edit -->
</div>
@endsection