@extends('backend.admin')

@section('content')
<h1>Brand Update Form</h1>

<form action="{{route('Brand.update',$brand->id)}}" method="post" enctype="multipart/form-data">

@csrf



  <div class="form-group">
    <label for="name">Enter Brand Name</label>
    <input name="brand_name" value="{{$brand->name}}" type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter Brand Name">
  </div>

  <div class="form-group">
    <label for="name">Enter Description</label>
    <textarea class="form-control" name="brand_description" value="{{$brand->description}}" id="" placeholder="Enter Description"></textarea>

  </div>

  <button type="submit" class="btn btn-primary">Update</button>
</form>






@endsection





