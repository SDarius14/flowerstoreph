@extends('dashboard')

@section('products-content')

    <div class="flex p-4 justify-center items-center">
        <div class="flex flex-col items-center w-80 justify-center border border-slate-200 shadow-md shadow-slate-400 p-4 rounded-md gap-3 bg-white">
            <div class="h-28 w-44 flex justify-center items-center">
                <img src="{{ asset('storage/'.$product->product_image)}}" alt="product_image" class="h-full object-cover object-center" />
            </div>
            <div class="flex flex-col self-start items-start pb-6">
                <h3 class="text-2xl">{{$product->product_name}}</h3>
                <p class="text-sm text-slate-500">{{$product->product_description}}</p>

                <p class="text-base text-amber-500" >
                    Price: ₱{{number_format($product->price, 2, '.', ',')}}
                </p>
            </div>
            
            <div class="text-slate-500 self-end text-xs">
                Stock: {{$product->quantity}}
            </div>

            <form method="POST" action="{{ route('orders.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="text" name="id" id="id" value={{$product->id}} hidden/>
                <button class="text-white text-base px-4 py-2 bg-blue-800 hover:bg-blue-900 mx-auto" type="submit">Place Order</button>
            
            </form>
        </div>
    </div>

@endsection
