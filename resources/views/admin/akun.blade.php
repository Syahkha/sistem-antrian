@extends('layouts.index')
@section('title')
AKUN
@endsection
@section('konten')
<div class="main-content" style="min-height: 571px;">

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
            

            <div class="row mt-sm-4">             
              <div class="col-12">
                <div class="card">
                  <form action="{{url('up-akun')}}" method="post" class="needs-validation">
                  @csrf
                  @foreach ($data as $item)
                    <div class="card-header">
                      <h4>Edit Akun</h4>
                    </div>
                    <div class="card-body">
                        
                          <div class="form-group">
                            <label>Nama</label>
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <input type="text" name="name" value="{{$item->name}}" id="" class="form-control" required="">
                            <div class="invalid-feedback">
                              Wajib diisi
                            </div>
                          </div>
                        
                        
                        
                          <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" value="{{$item->email}}" id="" class="form-control" required="">
                            <div class="invalid-feedback">
                              Please fill in the email
                            </div>
                          </div>
                          <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control">
                          </div>
                        
                        
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary">Simpan</button>
                    </div>
                    @endforeach
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
@endsection
