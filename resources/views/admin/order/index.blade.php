@extends('layouts.app')

@section('title','Order Details')

@push('css')

@endpush

@section('content')

<div class="app-title">
    <div>
      <h1><i class="material-icons">supervisor_account</i>All Orders</h1>
      <!--p>Table to display analytical data effectively</p-->
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Order</li>
      <li class="breadcrumb-item active"><a href="#">All Orders</a></li>
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
          	<a href="{{route('order.create')}}" class="btn btn-sm btn-primary">Create New Order</a>
            <hr>
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Item</th>
                <th>Qty</th>
                <th>Price</th>
                <th>UOM</th>
                <th>Payment Method</th>
                <th>Date</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
       			@foreach($orders as $order)
       				<tr>
                <td>{{$order->id}}</td>
       					<td>{{$order->name}}</td>
       					<td>{{$order->phone}}</td>
       					<td>{{$order->address}}</td>
       					<td>{{$order->item->name}}</td>
                <td>{{$order->qty}}</td>
                <td>{{$order->price}}</td>
       					<td>{{$order->uom->name}}</td>
                <td>{{$order->payment_method}}</td>
       					<td>{{$order->created_at}}</td>
       					<td class="text-center">
                  <a class="btn btn-sm btn-info" href="{{route('order.edit',$order->id)}}"><i class="fa fa-edit"></i></a>


                 <form action="{{route('order.destroy',$order->id)}}" method="post" style="display: inline;" onsubmit="return confirm('Are you sure? want to delete')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></button> 
                  <a class="btn btn-sm btn-info" href="{{route('order.show',$order->id)}}"><i class="fa fa-file"></i></a>   
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