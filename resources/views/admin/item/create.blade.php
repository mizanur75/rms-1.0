@extends('layouts.app')

@section('title','Create Item')

@section('content')
	<div class="app-title">
    <div>
          <h1><i class="fa fa-edit"></i> Add New Item</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Item</li>
          <li class="breadcrumb-item"><a href="#"> Add New Item</a></li>
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
        <h3 class="tile-title">New Item</h3>
        <div class="tile-body">
          <form class="form-horizontal" action="{{route('item.store')}}" method="post" enctype="multipart/form-data">
          	@csrf
            <div class="form-group row">
              <label class="control-label col-md-2">Category</label>
              <div class="col-md-3">
                <select name="cmbCategory" class="form-control">
                  @foreach($categories as $category)
                      <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
              </div>

              <label class="control-label col-md-2">UOM</label>
              <div class="col-md-3">
                <select name="cmbUOM" class="form-control">
                  @foreach($uoms as $uom)
                      <option value="{{$uom->id}}">{{$uom->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-2">Name</label>
              <div class="col-md-8">
                <input class="form-control" type="text" name="txtName" placeholder="Enter Name" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-2">Price</label>
              <div class="col-md-8">
                <input class="form-control" type="text" name="txtPrice" placeholder="Enter Price" required>
              </div>
            </div>
            
            <div class="form-group row">
              <label class="control-label col-md-2">Description</label>
              <div class="col-md-8">
                <input class="form-control" type="text" name="txtDescription" placeholder="Enter Description" required>
              </div>
            </div>
            
            
            <!-- <div class="form-group row">
              <label class="control-label col-md-2">Image</label>
              <div class="col-md-8">
                <input type="file" name="fileImage">
              </div>
            </div> -->
          
        </div>
          <div class="row">
          	<div class="col-md-7" style="margin-right: 40px;"></div>
            <div class="col-md-3">
            <a class="btn btn-secondary" href="{{route('item.index')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>&nbsp;&nbsp;&nbsp;<button class="btn btn-primary" type="submit" name="txtAdd"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add</button>
            </div>
          </div>
        </form>
    </div>

@endsection

@push('scripts')

@endpush