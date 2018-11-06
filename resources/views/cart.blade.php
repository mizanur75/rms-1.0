
<div class="tile-body">
    <form class="form-horizontal" action="{{url('/cart/add')}}" method="post">
	      @csrf
	      
	      <div class="form-group row">
	        <label class="control-label col-md-2">Name</label>:
	        <div class="col-md-3">
	          <input class="form-control" name="txtName" type="text" placeholder="Enter Item Qty">
	        </div>
	      </div>
	      <div class="form-group row">
	        <label class="control-label col-md-2">Qty</label>:
	        <div class="col-md-3">
	          <input class="form-control" name="txtQty" type="text" placeholder="Enter Item Qty">
	        </div>
	        <label class="control-label col-md-2">Price</label>:
	        <div class="col-md-3">
	          <input class="form-control" name="txtPrice" type="text" placeholder="Enter Item Price">
	        </div>
	        
	      </div>      
	    <div class="row">
	      <div class="col-md-7" style="margin-right: 45px;"></div>
	      <div class="col-md-3">
	        <a class="btn btn-secondary" href="{{route('order.index')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>&nbsp;&nbsp;&nbsp;<input class="btn btn-primary" type="submit" value="Create" >
	      </div>
	      <div class="col-md-1">
	        <a class="btn btn-primary" href="{{route('order.create')}}">Ok</a>
	      </div>
	    </div>
    </form>
</div>
