@extends('layouts.app')

@section('title', 'Item Details')

@push('css')

@endpush

@section('content')
<div class="app-title">
    <div>
      <h1><i class="material-icons">slideshow</i>All Items</h1>
      <!--p>Table to display analytical data effectively</p-->
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Item</li>
      <li class="breadcrumb-item active"><a href="#">All Items</a></li>
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
          	<a href="{{route('item.create')}}" class="btn btn-sm btn-primary">Add New</a>
            <hr>
            <thead>
              <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Price</th>
                <th>UOM</th>
                <th>Description</th>
                <th>Category</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
       			@foreach($items as $key=>$item)
       				<tr>
       					<td>{{$key + 1}}</td>
       					<td>{{$item->name}}</td>
                <td>{{$item->price}}</td>
       					<td>{{$item->uom->name}}</td>
                <td>{{$item->description}}</td>
       					<td>{{$item->category->name}}</td>
       					<td class="text-center"><a class="btn btn-sm btn-info" href="{{route('item.edit',$item->id)}}"><i class="fa fa-edit"></i></a>
                  <form action="{{route('item.destroy',$item->id)}}" method="post" style="display: inline;" onsubmit="return confirm('Are you Sure? Want to delete')">
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