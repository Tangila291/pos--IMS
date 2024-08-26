<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Customer;
use App\Models\Sale;
use App\Models\SaleDetail;





use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SaleController extends Controller
{
    public function list()
    {
        $products=product::all();
        $myCart=session()->get('basket') ?? [];

        


        return view('backend.salelist',compact('products','myCart'));
    }
    public function  showProduct($id)
    {
      
      $singleProduct=Product::find($id);

     
      $relatedProduct=Product::where('id','!=',$singleProduct->id)
                      ->limit(4)
                      ->get();

      //method chaining
      return view('backend.pages.single_product',compact('singleProduct','relatedProduct'));
    }
    public function addToCart($pId)
    {
        
        $product=Product::find($pId);
        //$customer=Customer::find($pId);
        $myCart=session()->get('basket') ?? [];
        if($myCart=session()->get('basket'))
        {
                            if(empty($myCart))
                        {
                            //action: add to cart
                            $cart[$product->id]=[
                                //key=>value
                                'product_id'=>$product->id,
                                //'customer_name'=>$customer->name,
                                //'customer_mobile'=>$customer->mobile,



                                'product_name'=>$product->name,
                                'price'=>$product->price,
                                'quantity'=>1,
                                'subtotal'=>1 * $product->price,
                                'image'=>$product->image
                            ];

                        session()->put('basket',$cart);
                        // session()->forget('basket');
                        

                            notify()->success('Product added to cart.');
                            return redirect()->back();
                        }else{

                            if(array_key_exists($pId,$myCart))
                            {
                                // dd($myCart[$pId]);
                                //step 2: quantity update, subtotal update
                            //q=1,sub=300
                                $myCart[$pId]['quantity'] = $myCart[$pId]['quantity'] + 1;
                                $myCart[$pId]['subtotal'] = $myCart[$pId]['quantity'] * $myCart[$pId]['price'];

                            session()->put('basket',$myCart);
                            // session()->forget('basket');

                                notify()->success('Quantity updated.');
                                return redirect()->back();


                            }
                            else{
                                //step 3: add to cart
                                $myCart[$product->id]=[
                                    'product_id'=>$product->id,
                                    'product_name'=>$product->name,
                                    //'customer_name'=>$customer->name,
                                    //'customer_mobile'=>$customer->mobile,



                                    'price'=>$product->price,
                                    'quantity'=>1,
                                    'subtotal'=>1 * $product->price,
                                    'image'=>$product->image
                                ];

                                
                            session()->put('basket',$myCart);
                            //  session()->forget('basket');

                                notify()->success("Product Added to Cart");
                                return redirect()->back();
                            }
                        }

        }else{
            notify()->error("Cart is em");
            return redirect()->back();
   
        }

        //$myCart=session()->get('basket');
        // dd($myCart);
        //step 1: cart empty
        
    }

    public function viewCart()
    {
        //ternary operator (condition) ? statement 1 : statement2

        //null coalescing ??
        //$a=5; $b=6;
        // $x= $a ?? $b

        $myCart=session()->get('basket') ?? [];

     
        return view('backend.salelist',compact('myCart'));
    }

    public function clearCart()
    {

      session()->forget('basket');

      notify()->success('Cart clear.');

      return redirect()->back();

    }

    public function cartItemDelete($productId)
    {
        
        $cart=session()->get('basket');

       unset($cart[$productId]);


    
       session()->put('basket',$cart);

       notify()->success('Item remove.');

       return redirect()->back();



       

    }
    public function search()
    {
        $allProduct=Product::where('name','LIKE','%'.request()->search_key.'%')->get();                          


        return view('backend.page.search',compact('allProduct'));
    }
    public function placeOrder(Request $request)
    {

        // dd($request->all());
        //step1 validation
       $validation=Validator::make($request->all(),[
        'receiver_name'=>'required',
        'receiver_email'=>'required|email',
        'receiver_address'=>'required',
        'paymentMethod'=>'required|in:cod,online'
        ]);

    if($validation->fails())
    {
        notify()->error($validation->getMessageBag());
       
        return redirect()->back();
    }

        if($myCart=session()->get('basket')){
        
        //quary for store data into Orders table
       
        $order=Sale::create([
            'receiver_name'=>$request->receiver_name,
            'receiver_email'=>$request->receiver_email,
            'receiver_address'=>$request->receiver_address,
            'receiver_mobile'=>$request->receiver_mobile,
            'payment_method'=>$request->paymentMethod,
            //'customer_id'=>auth('customerGuard')->user()->id,
            'total_amount'=>array_sum(array_column($myCart,'subtotal'))


        ]);

        //quary for storing data into Order_details table
           
        foreach($myCart as $singleData)
        {
          
            SaleDetail::create([
                'order_id'=>$order->id,
                
                'product_id'=>$singleData['product_id'],
                'product_unit_price'=>$singleData['price'],
                'product_quantity'=>$singleData['quantity'],
                'subtotal'=>$singleData['subtotal'],
            ]);
        }
           

        notify()->success('Order place successfully.');
        session()->forget('basket');
        return redirect()->back();
    }else{
        notify()->error('Cart is Empty.');
        return redirect()->back();


    }

    }
    public function viewInvoice($id)
    {
        
        $order=Sale::with('saledetails')->find($id);
        
        //dd($order);
        
        

       return view('backend.page.invoice',compact('order'));
        
    }
    public function orderList()
    {
        $allOrder=Sale::paginate(10);
        return view('backend.orderlist',compact('allOrder'));

    }
    public function report()
    {
        if(request()->has('from_date') && request()->has('to_date'))
        {
            $orderReport=Sale::whereBetween('created_at',[request()->from_date,request()->to_date])->get();
            return view('backend.reportform',compact('orderReport'));
        }
        $orderReport=Sale::all();
        return view('backend.reportform',compact('orderReport'));
    }

    
    
}


