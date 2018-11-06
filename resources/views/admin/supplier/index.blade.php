@extends('layouts.app')

@section('title', 'Supplier Details')

@push('css')

@endpush

@section('content')
<div class="app-title">
    <div>
      <h1><i class="material-icons">slideshow</i>All Suppliers</h1>
      <!--p>Table to display analytical data effectively</p-->
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Supplier</li>
      <li class="breadcrumb-item active"><a href="#">All Suppliers</a></li>
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
          	<a href="{{route('supplier.create')}}" class="btn btn-sm btn-primary">Add New</a>
            <hr>
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Added On</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
       			@foreach($suppliers as $key=>$supplier)
       				<tr>
       					<td>{{$supplier->id}}</td>
       					<td>{{$supplier->name}}</td>
                <td>{{$supplier->phone}}</td>
                <td>{{$supplier->email}}</td>
       					<td>{{$supplier->address}}</td>
       					<td>{{$supplier->created_at}}</td>
       					<td class="text-center"><a class="btn btn-sm btn-info" href="{{route('supplier.edit',$supplier->id)}}"><i class="fa fa-edit"></i></a>
                  <form action="{{route('supplier.destroy',$supplier->id)}}" method="post" style="display: inline;" onsubmit="return confirm('Are you Sure? Want to delete')">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-sm btn-danger" type="submit" ><i class="fa fa-trash"></i></a></button>    
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