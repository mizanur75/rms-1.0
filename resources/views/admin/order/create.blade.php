@extends('layouts.app')

@section('title','Create Order')

@push('css')

@endpush

@section('content')

<div class="app-title">
  <div>
    <h1><i class="fa fa-edit"></i> Create Order</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item">Oreder</li>
    <li class="breadcrumb-item"><a href="#">Create Order</a></li>
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
      <h3 class="tile-title">New Order</h3>
      <div class="tile-body">
        <form class="form-horizontal" action="{{route('order.store')}}" method="post">
          @csrf
        <div class="form-group row">
          <label class="control-label col-md-2">Name</label>:
          <div class="col-md-8">
            <input class="form-control" name="txtName" type="text" placeholder="Enter Customer Name">
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-2">Phone</label>:
          <div class="col-md-3">
            <input class="form-control" name="txtPhone" type="text" placeholder="Enter Phone Number">
          </div>
          <label class="control-label col-md-2">Payment Method</label>:
          <div class="col-md-3">
            <select name="cmbPayment" class="form-control">
                <option value="Cash">Cash</option>
                <option value="Credit Card">Credit Card</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-2">Address</label>:
          <div class="col-md-8">
            <input class="form-control" name="txtAddress" type="text" placeholder="Enter Customer Address">
          </div>
        </div>
        <div class="row table-responsive">
          <table class="table table-sm table-bordered">
            <thead>
              <tr>
                <th>Item Name</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Discount</th>
                <th>Line Total</th>
                <th class="text-right"><input type="button" class="btn btn-sm btn-primary addRow" value="+"/></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <select name="cmbItem" class="form-control item">
                    <option>-- Select --</option>
                    @foreach($items as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                  </select>
                </td>
                <td><input type="text" name="price[]" class="form-control price" /></td>
                <td><input type="text" name="qty[]" class="form-control qty" value="1" /></td>
                <td><input type="text" name="dis[]" class="form-control dis" placeholder="%" /></td>
                <td><input type="text" name="amount[]" class="form-control amount" /></td>
                <td class="text-right"><input type="button" class="btn btn-sm btn-danger remove" value="x"/></td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <td style="border:none;"></td>
                <td style="border:none;"></td>
                <td style="border:none;"></td>
                <td style="border:none; text-align:right;"><b>Total</b></td>
                <td style="border:none;" class="total"></td>
              </tr>
            </tfoot>
          </table>
        </div>       
      </div>
        <div class="row">
          <div class="col-md-9"></div>
          <div class="col-md-3">
            <a class="btn btn-secondary" href="{{route('order.index')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>&nbsp;&nbsp;&nbsp;<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Create</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="clearix"></div>

@endsection

@push('scripts')
<script>
  $('tbody').delegate('.price,.qty,.dis','keyup', function(){
    var tr = $(this).parent().parent();
    var price = tr.find('.price').val();
    var qty = tr.find('.qty').val();
    var dis = tr.find('.dis').val();
    var amount = (qty * price) - (qty * price * dis)/100;
    tr.find('.amount').val(amount);
    total();
  });
  $('.item').change(function(){
    var itemId = $(this).val();
  });
  $('thead').delegate('.addRow','click', function(){
    addRow();
  });
  function total(){
    var total = 0;
    $('.amount').each(function(i,e){
      var amount = $(this).val()-0;
      total += amount;
      $('.total').html(total);
    });
  };
  function addRow(){
    var addRow = '<tr>'+
                    '<td>'+
                      '<select name="cmbItem" class="form-control item">'+
                        '<option>-- Select --</option>'+
                        '@foreach($items as $item)'+
                          '<option value="{{$item->id}}">{{$item->name}}</option>'+
                        '@endforeach'+
                      '</select>'+
                    '</td>'+
                    '<td><input type="text" name="price[]" class="form-control price" /></td>'+
                    '<td><input type="text" name="qty[]" class="form-control qty" value="1" /></td>'+
                    '<td><input type="text" name="dis[]" class="form-control dis" placeholder="%" /></td>'+
                    '<td><input type="text" name="amount[]" class="form-control amount" /></td>'+
                    '<td class="text-right"><input type="button" class="btn btn-sm btn-danger remove" value="x"/></td>'+
                  '</tr>';
    $('tbody').append(addRow);
  };
  $('tbody').delegate('.remove', 'click', function(){
    var l = $('tbody tr').length;
    if(l==1){
      alert('You Can Not Remove Last One!');
    }else{
      $(this).parent().parent().remove();
    }
  });
</script>
@endpush