@extends('dashboard')

@section('products-content')


<div class="flex justify-center">

    <div class=" flex flex-col justify-center bg-slate-600 p-8 rounded-md my-6 shadow-lg shadow-slate-50" >
        <div class="text-center text-4xl text-white pb-2" >Orders</div>
        <div class="p-6 bg-white rounded-md" >
            <table class="table bg-white" id="productTable" >
                <thead>
                    <tr>
                        <th class="px-8 py-2">Order ID</th>
                        <th class="px-8 py-2">Order by</th>
                        <th class="px-8 py-2">Product Name</th>
                        <th class="px-8 py-2">Price</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td class="text-center align-middle">{{$order->id}}</td>

                        <td class="align-middle flex justify-center" >
                            {{$order->user->email}}
                        </td>

                        <td class="text-center align-middle">
                            {{ $order->product->product_name}}
                        </td>  

                        <td class="text-center align-middle">
                            ₱{{ number_format($order->product->price, 2, '.', ',') }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
       
    </div>
</div>
    
@endsection