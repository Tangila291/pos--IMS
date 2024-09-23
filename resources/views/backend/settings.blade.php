@extends('backend.admin')


@section('content')
<h1>Settings Form</h1>



<form action="{{route('Settings.submit')}}" method="post" enctype="multipart/form-data">
@csrf
  <div class="form-group">
    <label for="logo">Upload Logo</label>
    <input name="logo"  type="file" class="form-control" id="logo" placeholder="Logo">
  </div>

  <div class="form-group">
    <label for="name"> Business Name</label>
    <input name="business_name" value="{{$setting->name}}"   type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Business Name">
  </div>

  <div class="form-group" style="margin-top: 10px;">
    <label for="">Enter Address</label>
   <textarea class="form-control" name="address" id="" placeholder="Enter Address">{{$setting->address??''}}</textarea>
  </div>


  <div class="form-group" style="margin-top: 10px;">
    <label for="">Enter Contact Number</label>
   <input  value="{{$setting->contact_number}}"  class="form-control" type="number" name="contact" id="" placeholder="Enter contact number">
  </div>





  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection