@extends('layouts.app')

@section('title','Employee Details')

@push('css')

@endpush

@section('content')

<div class="app-title">
  <div>
    <h1><i class="fa fa-edit"></i> Add Employee</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item">Employee</li>
    <li class="breadcrumb-item"><a href="#">Add Employee</a></li>
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
      <h3 class="tile-title">Employee</h3>
      <div class="tile-body">
        <form class="form-horizontal" action="{{route('employee.store')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group row">
            <label class="control-label col-md-3">Role</label>:
            <div class="col-md-8">
              <select name="cmbRole" id="" class="form-control">
                @foreach($roles as $role)
                  <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Name</label>:
            <div class="col-md-8">
              <input class="form-control" name="txtName" type="text" placeholder="Enter full name">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Phone</label>:
            <div class="col-md-8">
              <input class="form-control" name="txtPhone" type="text" placeholder="Enter Phone Number">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Email</label>:
            <div class="col-md-8">
              <input class="form-control" name="txtEmail" type="email" placeholder="Enter email address">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Present Address</label>:
            <div class="col-md-8">
              <textarea class="form-control" name="txtPreAddress" rows="4" placeholder="Enter your present address"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Permanent Address</label>:
            <div class="col-md-8">
              <textarea class="form-control" name="txtPerAddress" rows="4" placeholder="Enter your permanent address"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Sex</label>
            <div class="col-md-9">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="txtGender" value="Male">Male
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="txtGender" value="Female">Female
                </label>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Upload Image</label>:
            <div class="col-md-8">
              <input type="file" name="txtId">
            </div>
          </div>
      </div>
        <div class="row">
          <div class="col-md-8" style="margin-right: 45px;"></div>
          <div class="col-md-3">
            <a class="btn btn-secondary" href="{{route('employee.index')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>&nbsp;&nbsp;&nbsp;<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add</button>
          </div>
        </div>
        </form>
    </div>
  </div>
  <div class="clearix"></div>

@endsection

@push('css')

@endpush