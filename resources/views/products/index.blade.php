@extends('dashboard')

@section('products-content')

    <div class="flex flex-col p-2 md:p-10" >
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3 text-white">Add Product</a>
        <div class="flex flex-wrap gap-4 px-1 md:px-8 justify-center items-center" >
            @foreach ($products as $product)
                @if ($product->status)
                    <div class="flex flex-col border border-slate-100 hover:border-slate-500 shadow-md shadow-slate-600 bg-white p-8 gap-1 rounded-md" >
                        <div class="flex p-2 h-28 w-44 justify-center items-center" >
                            <img class="h-full object-cover object-center" src="{{ asset('storage/'.$product->product_image)}}" alt="">
                        </div>
                        <h4 class="text-2xl">{{$product->product_name}}</h4>
                        <div class="text-base">
                            Stock: {{$product->quantity}}
                        </div>
                        <a class="text-white text-base self-start px-4 py-2 bg-blue-800 hover:bg-blue-900" href="/products/{{$product->id}}">View Product</a>
                    </div>
                @endif  
            @endforeach
            
        </div>
    </div>

    
@endsection