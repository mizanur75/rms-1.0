@extends('layouts.app')

@section('title','Reservation Details')

@push('css')

@endpush

@section('content')

<div class="app-title">
    <div>
      <h1><i class="material-icons">supervisor_account</i>All Reservation</h1>
      <!--p>Table to display analytical data effectively</p-->
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Reservation</li>
      <li class="breadcrumb-item active"><a href="#">All Reservation</a></li>
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
      <div class="tile">
        <div class="tile-body">

          <table class="table table-hover table-bordered table-sm" id="sampleTable">
            <thead>
              <tr>
                <th width="2%">SL</th>
                <th width="18%">Name</th>
                <th width="5%">Phone</th>
                <th width="7%">Email</th>
                <th width="12%">Reserve Date</th>
                <th width="13%">Message</th>
                <th width="7%">Status</th>
                <th width="12%" class="text-center">Reservation On</th>
                <th width="14%" class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
       			@foreach($reservations as $key=>$reservation)
       				<tr>
       					<td>{{$key + 1}}</td>
       					<td>{{$reservation->name}}</td>
       					<td>{{$reservation->phone}}</td>
       					<td>{{$reservation->email}}</td>
       					<td>{{$reservation->date}}</td>
                <td>{{$reservation->message}}</td>
                <td>
                  @if($reservation->status == true)
                    <span class="btn btn-sm btn-success">Confirmed</span>
                  @else
                    <span class="btn btn-sm btn-danger">Not Confirmed</span>
                  @endif
                </td>
       					<td>{{$reservation->created_at}}</td>
       					<td class="text-center">
                  @if($reservation->status == false)
                 <form action="{{route('reservation.update',$reservation->id)}}" method="post" style="display: inline;" onsubmit="return confirm('Are you confirmed by phone this reservation?')">
                  @csrf
                  @method('PUT')
                  <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check"></i></a></button>    
                </form>
                @endif
                <form action="{{route('reservation.destroy',$reservation->id)}}" method="post" style="display: inline;" onsubmit="return confirm('Are you sure? want to delete')">
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
<script>
  $('#sampleTable').DataTable();
</script>
@endpush