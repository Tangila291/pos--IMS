@extends('backend.admin')
@section('content')

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Receiver Name</th>
      <th scope="col">Address</th>
      <th scope="col">Mobile</th>
      <th scope="col">Status</th>
      <th scope="col">Amount</th>
      <th scope="col">Order Date</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>

  @foreach ($allOrder as $order)


    <tr>
    <th scope="row">{{$order->id}}</th>
      <td>{{$order->receiver_name}}</td>
      <td>{{$order->receiver_address}}</td>
      <td>{{$order->receiver_mobile}}</td>
      <td>{{$order->status}}</td>
      <td>{{$order->total_amount}}</td>

      <td>{{$order->created_at}}</td>
      <td>
        <div class="d-flex">
          <a href="{{route('View.invoice',$order->id)}}" class="btn btn-primary">View</a>
          <a class="btn btn-danger" href="">Delete</a>
        </div>
      </td>
    @endforeach
  </tbody>
</table>

@endsection