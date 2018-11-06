@extends('layouts.app')

@section('title','Employee Details')

@push('css')

@endpush

@section('content')

<div class="app-title">
  <div>
    <h1><i class="fa fa-edit"></i> Edit Employee</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item">Employee</li>
    <li class="breadcrumb-item"><a href="#">Edit Employee</a></li>
  </ul>
</div>
    <div class="tile">
      <h3 class="tile-title">Edit Employee</h3>
      <div class="tile-body">
        <form class="form-horizontal" action="{{route('employee.update',$employee->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group row">
            <label class="control-label col-md-3">Role</label>:
            <div class="col-md-8">
              <select name="cmbRole" id="" class="form-control">
                @foreach($roles as $role)
                  <option {{$role->id == $employee->role->id ? 'selected':''}} value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Name</label>:
            <div class="col-md-8">
              <input class="form-control" name="txtName" type="text" value="{{$employee->name}}">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Phone</label>:
            <div class="col-md-8">
              <input class="form-control" name="txtPhone" type="text" value="{{$employee->phone}}">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Email</label>:
            <div class="col-md-8">
              <input class="form-control" name="txtEmail" type="email" value="{{$employee->email}}">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Present Address</label>:
            <div class="col-md-8">
              <textarea class="form-control" name="txtPreAddress" rows="4" value="{{$employee->pre_address}}"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Permanent Address</label>:
            <div class="col-md-8">
              <textarea class="form-control" name="txtPerAddress" rows="4" value="{{$employee->per_address}}"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Sex</label>
            <div class="col-md-9">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" value="Male" name="txtGender">Male
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" value="Female" name="txtGender">Female
                </label>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Identity Proof</label>:
            <div class="col-md-8">
              <input type="file" name="txtId">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-8 col-md-offset-3">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox">I accept the terms and conditions
                </label>
              </div>
            </div>
          </div>
      </div>
        <div class="row">
          <div class="col-md-8" style="margin-right: 45px;"></div>
          <div class="col-md-3">
            <a class="btn btn-secondary" href="{{route('employee.index')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>&nbsp;&nbsp;&nbsp;<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
          </div>
        </div>
        </form>
    </div>
  </div>

@endsection

@push('css')

@endpush