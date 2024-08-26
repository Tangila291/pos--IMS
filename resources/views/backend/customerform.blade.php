@extends('backend.admin')

@section('content')

<form action="{{route('Customer.store')}}" method="post">
@csrf
<div class="form-group">
    <label for="name">Enter Customer Name</label>
    <input name="customer_name"type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter Customer Name">
  </div>

   <!--<div class="form-group">
    <label for="name">Customer Password</label>
    <textarea class="form-control"type="text" name="customer_password" id="" placeholder="Customer Password"></textarea>
  </div>-->

  <div class="form-group">
    <label for="name">Customer Address</label>
    <textarea class="form-control"type="text" name="customer_address" id="" placeholder="Customer Address"></textarea>
  </div> 

  <div class="form-group">
    <label for="name">Customer Email</label>
    <textarea class="form-control" name="customer_email" id="" placeholder="Customer Email"></textarea>
  </div>

  <div class="form-group">
    <label for="name">Customer Mobile:</label>
    <input name="customer_mobile" type="text" class="form-control" id=""  placeholder="Customer Mobile">
  </div>
  <div class="form-group">
    <label for="name">Customer DOB:</label>
    <input name="customer_dob" type="text" class="form-control" id=""  placeholder="Customer DOB">
  </div>
  <div class="form-group" style="margin-top: 10px;">
    <label for="name">Uplaod Image</label>
    <input name="customer_image" type="file" class="form-control" id="name" placeholder="Enter Customer Name">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>




@endsection