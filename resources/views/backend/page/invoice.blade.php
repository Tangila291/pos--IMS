@extends('backend.admin')

@section('content')

<div class="container">
<button class="btn btn-success" onClick="printReport()">Print</button>
    
<!-- print area suru -->

    <div class="card" id="printArea">
        <div class="card-header">
        <div>
           <h1 style='text-align:center'> POS & Inventory Management System</h1>
        </div>
            Invoice
            <strong>{{$order->created_at}}</strong>
            <span class="float-right"> <strong>Status:</strong> {{$order->status}}</span>

        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h6 class="mb-3">From:</h6>
                    <div>
                        <strong>POS&IMS</strong>
                    </div>
                    <div></div>
                    <div> Uttara, Dhaka</div>
                    <div>Email: posims@gmail.com</div>
                    <div>Phone: +8801777961955</div>
                </div>

                <div class="col-sm-6">
                    <h6 class="mb-3">To:</h6>
                    <div>
                        <strong>{{$order->receiver_name}}</strong>
                    </div>
                 
                    <div>{{$order->receiver_address}}</div>
                    <div>Email: {{ $order->receiver_email }}</div>
                    <div>Phone: {{$order->receiver_mobile}}</div>
                </div>



            </div>

            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="center">#</th>
                            <th>Item</th>
                            <th class="right">Product Name</th>
                            <th class="center">Quantity</th>
                            <th class="right">Single Price</th>
                            <th class="right">Total Amount</th>

                        </tr>
                    </thead>
                    <tbody>


                    @foreach ($order->saledetails as $item)
                        
                        <tr>
                            <td class="center">{{$item->id}}</td>
                            <td class="center"><img style="width: 50px;" src="{{url('/uploads/'.$item->product->image)}}" alt=""></td>
                            <td class="left strong">{{$item->product->name}}</td>
                            <td class="center">{{$item->product_quantity}}</td>
                            <td class="right">{{$item->product_unit_price}}</td>
                            <td class="right">{{$item->subtotal}}</td>
                        </tr>

                        @endforeach
                       
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-5">

                </div>

                <div class="col-lg-4 col-sm-5 ml-auto">
                    <table class="table table-clear">
                        <tbody>
                            <tr>
                                <td class="left">
                                    <strong>Subtotal</strong>
                                </td>
                                <td class="right">{{$order->total_amount}}</td>
                            </tr>
                            @if($item->discount!='0')
                                <tr>
                                <td class="left">
                                    <strong>Discount </strong>
                                </td>
                                <td class="right">{{$item->discount}}</td>
                            </tr>
                            
                            @endif
                          
                            <tr>
                                <td class="left">
                                    <strong>Total</strong>
                                </td>
                                <td class="right">
                                    <strong>{{$order->total_amount}}</strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                  

                </div>

            </div>

        </div>
    </div>

    <!-- print area sesh -->
</div>


<script type="text/javascript">
    function printReport()
    {
        var printContents = document.getElementById("printArea").innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;
    }
</script>
@endsection