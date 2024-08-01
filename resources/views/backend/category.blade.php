@extends('backend.admin')
@section('content')
<h1>Category</h1>
<a class="btn btn-primary" href="{{route('Category.form')}}">Create Category</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category Name</th>
      <th scope="col">Description</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>

  @foreach ($allCategory as $cat)

    <tr>
    <th scope="row">{{$cat->id}}</th>
      <td>{{$cat->name}}</td>
      <td>{{$cat->description}}</td>
      <td>{{$cat->status}}</td>
      <td>
        <a class="btn btn-success" href="">View</a>
        <a class="btn btn-info" href="">Edit</a>
        <a class="btn btn-danger" href="">Delete</a>
      </td>
    @endforeach
  </tbody>
</table>





@endsection