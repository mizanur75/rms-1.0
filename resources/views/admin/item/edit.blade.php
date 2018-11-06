@extends('layouts.app')

@section('title','Edit Item')

@section('content')
	<div class="app-title">
    <div>
          <h1><i class="fa fa-edit"></i> Edit Item</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Item</li>
          <li class="breadcrumb-item"><a href="#"> Edit Item</a></li>
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
        <h3 class="tile-title">Edit Item</h3>
        <div class="tile-body">
          <form class="form-horizontal" action="{{route('item.update',$item->id)}}" method="post" enctype="multipart/form-data">
          	@csrf
            @method('PUT')
            <div class="form-group row">
              <label class="control-label col-md-2">Category</label>
              <div class="col-md-8">
                <select name="cmbCategory" class="form-control">
                  @foreach($categories as $category)
                      <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-2">Name</label>
              <div class="col-md-8">
                <input class="form-control" type="text" name="txtName" value="{{$item->name}}">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-2">Price</label>
              <div class="col-md-8">
                <input class="form-control" type="text" name="txtPrice" value="{{$item->price}}">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-2">UOM</label>
              <div class="col-md-8">
                <input class="form-control" type="text" name="txtUOM" value="{{$item->uom->name}}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-2">Description</label>
              <div class="col-md-8">
                <input class="form-control" type="text" name="txtDescription" value="{{$item->description}}">
              </div>
            </div>
            
            
            <!-- <div class="form-group row">
              <label class="control-label col-md-2">Description</label>
              <div class="col-md-8">
                <input type="file" name="fileImage"  value="{{$item->description}}">
              </div>
            </div> -->
          
        </div>
        <div class="tile-footer">
          <div class="row">
          	<div class="col-md-7" style="margin-right: 40px;"></div>
            <div class="col-md-3">
            <a class="btn btn-secondary" href="{{route('item.index')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>&nbsp;&nbsp;&nbsp;<button class="btn btn-primary" type="submit" name="txtAdd"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
            </div>
          </div>
        </div>
        </form>
    </div>

@endsection

@push('scripts')

@endpush