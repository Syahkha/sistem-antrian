@extends('layouts.index')
@section('title')
DATA AKUN
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
                            <h4>DATA ADMIN</h4>
                            <div class="card-header-action">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah
                                    Admin</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Hak Akses</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1;?>
                                        @foreach ($data as $item)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->role}}</td>
                                            <td>
                                                <a class="btn btn-primary btn-action mr-1" data-toggle="modal" title=""
                                                    data-target="#edit{{$item->ids}}" data-original-title="Edit"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                <a onclick="return confirm('hapus data?')"
                                                    href="{{url('hapus-akun').'/'.$item->ids}}"
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
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{url('simpan-akun')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Pegguna</label>
                            <input type="text" name="name" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="text" name="pass" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Tentukan Hak Akses</label>
                            <select name="role" id="" class="form-control">
                                @foreach ($role as $item)
                                <option value="{{$item->id}}">{{$item->role}}</option>
                                @endforeach
                            </select>
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
    <div class="modal fade" tabindex="-1" role="dialog" id="edit{{$item->ids}}" style="display: none;"
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
                    <form action="{{url('update-akun')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama </label>
                            <input type="hidden" name="id" value="{{$item->ids}}">
                            <input type="text" name="name" id="" value="{{$item->name}}" class=" form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" id="" value="{{$item->email}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="text" name="pass" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Tentukan Hak Akses</label>
                            <select name="role" id="" class="form-control">
                                <option value="{{$item->idr}}">{{$item->role}}</option>
                                @foreach ($role as $items)
                                <option value="{{$items->id}}">{{$items->role}}</option>
                                @endforeach
                            </select>
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