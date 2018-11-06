@extends('layouts.app')

@section('title','Edit Supplier')

@section('content')
	<div class="app-title">
    <div>
          <h1><i class="fa fa-edit"></i> Edit Supplier</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Supplier</li>
          <li class="breadcrumb-item"><a href="#"> Edit Supplier</a></li>
        </ul>
    </div>
    <div class="tile">
      @if($errors->any())
        @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{$error}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endforeach
      @endif
        <h3 class="tile-title">Edit Supplier</h3>
        <div class="tile-body">
          <form class="form-horizontal" action="{{route('supplier.update',$supplier->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group row">
              <label class="control-label col-md-2">Name</label>
              <div class="col-md-8">
                <input class="form-control" type="text" name="txtName" value="{{$supplier->name}}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-2" >Phone</label>
              <div class="col-md-8">
                <input class="form-control" type="text" name="txtPhone" value="{{$supplier->phone}}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-2">Email</label>
              <div class="col-md-8">
                <input class="form-control" type="email" name="txtEmail" value="{{$supplier->email}}" required>
              </div>
            </div>
            
            
            <div class="form-group row">
              <label class="control-label col-md-2">Address</label>
              <div class="col-md-8">
                <textarea name="txtAddress" class="form-control" required></textarea>
              </div>
            </div>
          
        </div>
          <div class="row">
          	<div class="col-md-7" style="margin-right: 15px;"></div>
            <div class="col-md-3">
            <a class="btn btn-secondary" href="{{route('supplier.index')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>&nbsp;&nbsp;&nbsp;<button class="btn btn-primary" type="submit" name="txtAdd"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
            </div>
          </div>
        </form>
    </div>

@endsection

@push('scripts')

@endpush