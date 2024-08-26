@extends('backend.admin')

@section('content')

<h1>Customer List</h1>
<a class="btn btn-primary" href="{{route('Customer.form')}}">Create Customer</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Customer Address</th>
      <th scope="col">Customer Email</th>
      <th scope="col">Mobile Number</th>
      <th scope="col">Payment Method</th>
      <th scope="col">Total Amount</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  @php
  $i=0;
  @endphp
  @foreach ($allCustomer as $key=>$customer)

    <tr>
    <th scope="row">{{++$i}}</th>
      <td>{{$customer->receiver_name}}</td>
      <td>{{$customer->receiver_address}}</td>
      <td>{{$customer->receiver_email}}</td>
      <td>{{$customer->receiver_mobile}}</td>
      <td>{{$customer->payment_method}}</td>
      <td>{{$customer->total_amount}}</td>
      <td>
        <div class="d-flex">
          <a href="{{route('View.invoice',$customer->id)}}" class="btn btn-primary">View</a>
          <a class="btn btn-danger" href="">Delete</a>
        </div>
      </td>
    @endforeach
  </tbody>
</table>

{{$allCustomer->links()}}



@endsection


