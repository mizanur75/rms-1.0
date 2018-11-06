@extends('layouts.app')

@section('title','Invoice')

@section('content')

<div class="app-title">
  <div>
    <h1 style="display: inline;"><i class="fa fa-file-text-o"></i> Invoice </h1><a class="btn btn-secondary" href="{{route('order.index')}}" style="display: inline;"> Back</a>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="#">Invoice</a></li>
  </ul>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <section class="invoice">
        <div class="row mb-4">
          <div class="col-6">
            <h2 class="page-header"><i class="fa fa-globe"></i> Restaurant Management</h2>
          </div>
          <div class="col-6">
            <h5 class="text-right">Date: {{$order->created_at}}</h5>
          </div>
        </div>
        <div class="row invoice-info">
          <div class="col-4">
            <address><strong>RMS</strong><br>APCL<br>Dhanmondi-15<br>Dhaka-1209<br>Email: rms@gmail.com</address>
          </div>
          <div class="col-4">Customer Information
            <address><strong>{{$order->name}}</strong><br>Phone: {{$order->phone}}<br>Address: {{$order->address}}</address>
          </div>
          <div class="col-4"><b>Invoice No: {{$order->id}}</b><br><br><b>Order ID:</b> {{$order->id}}<br><b>Payment Method:</b> {{$order->payment_method}}<br></div>
        </div>
        <div class="row">
          <div class="col-12 table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>SL</th>
                  <th>Item Name</th>
                  <th>Qty</th>
                  <th>UOM</th>
                  <th>Unit Price</th>
                  <th>Total Price</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>{{$order->item->name}}</td>
                  <td>{{$order->qty}}</td>
                  <td>{{$order->uom->name}}</td>
                  <td>{{$order->price}}</td>
                  <td>{{$order->qty * $order->price}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="row d-print-none mt-2">
          <div class="col-12 text-right"><a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print</a></div>
        </div>
      </section>
    </div>
  </div>
</div>

@endsection