@extends('layouts.app')

@section('title','Employee Details')

@push('css')

@endpush

@section('content')

<div class="app-title">
    <div>
      <h1><i class="material-icons">supervisor_account</i>All Employees</h1>
      <!--p>Table to display analytical data effectively</p-->
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">employee</li>
      <li class="breadcrumb-item active"><a href="#">All Employees</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      @if(session('msg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{session('msg')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
      @if(session('umsg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{session('umsg')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
      @if(session('dmsg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{session('dmsg')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
      <div class="tile">
        <div class="tile-body">

          <table class="table table-hover table-bordered table-sm" id="sampleTable">
          	<a href="{{route('employee.create')}}" class="btn btn-sm btn-primary">Add New</a>
            <hr>
            <thead>
              <tr>
                <th width="2%">SL</th>
                <th width="18%">Name</th>
                <th width="5%">Phone</th>
                <th width="7%">Email</th>
                <th width="12%">Pre. Address</th>
                <th width="13%">Per. Address</th>
                <th width="4%">Role</th>
                <th width="4%">Sex</th>
                <th width="5%">Identity</th>
                <th width="12%" class="text-center">Added On</th>
                <th width="14%" class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
       			@foreach($employees as $key=>$employee)
       				<tr>
       					<td>{{$key + 1}}</td>
       					<td>{{$employee->name}}</td>
       					<td>{{$employee->phone}}</td>
       					<td>{{$employee->email}}</td>
       					<td>{{$employee->pre_address}}</td>
       					<td>{{$employee->per_address}}</td>
       					<td>{{$employee->role->name}}</td>
       					<td>{{$employee->sex}}</td>
       					<td class="text-center"> <img width="60px" height="60px" style="border-radius: 30px;" src="{{asset('uploads/employee/'.$employee->identity)}}" alt=""></td>
       					<td>{{$employee->created_at}}</td>
       					<td class="text-center"><a class="btn btn-sm btn-info" href="{{route('employee.edit',$employee->id)}}"><i class="fa fa-edit"></i></a>

                 <form action="{{route('employee.destroy',$employee->id)}}" method="post" style="display: inline;" onsubmit="return confirm('Are you sure? want to delete')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></button>    
                </form></td>
       				</tr>
       			@endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>


@endsection

@push('scripts')
<script type="text/javascript" src="{{asset('back/js/plugins/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('back/js/plugins/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush