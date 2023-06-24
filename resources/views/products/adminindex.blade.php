@extends('dashboard')

@section('products-content')

<div class="flex justify-center">

    <div class=" flex flex-col justify-center bg-slate-600 p-8 rounded-md my-6 shadow-lg shadow-slate-50" >
        <div class="text-center text-4xl text-white" >All Products</div>
        <a href="{{ route('products.create') }}" class="text-white text-center px-6 py-2 bg-blue-800 hover:bg-blue-900 mb-4 self-end">Add product</a>
        <div class="p-6 bg-white rounded-md" >
            <table class="table bg-white" id="productTable" >
                <thead>
                    <tr>
                        <th class="px-8 py-2" >Product Image</th>
                        <th class="px-8 py-2">Product Name</th>
                        <th class="px-8 py-2">Price</th>
                        <th class="px-8 py-2">Quantity</th>
                        <th class="px-8 py-2">Status</th>
                        <th class="px-8 py-2">Actions</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td class="align-middle flex justify-center" >
                            @if($product->product_image)
                                <img src="{{ asset('storage/'.$product->product_image) }}" class="object-cover object-center h-28 p-2" >
                            @else
                                No image
                            @endif
                        </td>
                        <td class="text-center align-middle">{{ $product->product_name}}</td>
                        <td class="text-center align-middle">₱{{ number_format($product->price, 2, '.', ',') }}</td>
                        <td class="text-center align-middle">{{ $product->quantity }}</td>
                        <td class="text-center align-middle">
                        @if ($product->status)
                            <div class="flex justify-around items-center">
                                <div class="border border-slate-300 bg-green-600 h-2 w-2 rounded-full" ></div> Enabled
                                <form class="hover:bg-gray-200 p-2 rounded-full flex justify-center items-center" action="{{ route('products.updateStatus', ['product' => $product->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <a href="" onclick="event.preventDefault(); this.closest('form').submit();">
                                        <svg width="16" height="16" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.79868 16.665V21.1975H2.26624" stroke="#1E1E1E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M20.396 12.1325V7.6001H24.9284" stroke="#1E1E1E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M20.6802 7.59717C22.243 9.2254 23.1975 11.3422 23.3831 13.5915C23.5686 15.8407 22.9739 18.0853 21.6989 19.9476C20.424 21.8099 18.5466 23.1764 16.3825 23.8171C14.2184 24.4578 11.8997 24.3338 9.81641 23.4658" stroke="#1E1E1E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M6.51371 21.2005C4.95422 19.5715 4.00274 17.4554 3.81904 15.2078C3.63533 12.9601 4.23059 10.7176 5.50485 8.85698C6.77912 6.99632 8.65478 5.63076 10.8169 4.9896C12.979 4.34844 15.2959 4.47074 17.3785 5.33595" stroke="#1E1E1E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </a>
                                </form>
                            </div>
                        @else
                            <div class="flex justify-around items-center">
                                <div class="border border-slate-300 bg-red-600 h-2 w-2 rounded-full" ></div> Disabled

                                <form class="hover:bg-gray-200 p-2 rounded-full flex justify-center items-center" action="{{ route('products.updateStatus', ['product' => $product->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <a href="" onclick="event.preventDefault(); this.closest('form').submit();">
                                        <svg width="16" height="16" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.79868 16.665V21.1975H2.26624" stroke="#1E1E1E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M20.396 12.1325V7.6001H24.9284" stroke="#1E1E1E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M20.6802 7.59717C22.243 9.2254 23.1975 11.3422 23.3831 13.5915C23.5686 15.8407 22.9739 18.0853 21.6989 19.9476C20.424 21.8099 18.5466 23.1764 16.3825 23.8171C14.2184 24.4578 11.8997 24.3338 9.81641 23.4658" stroke="#1E1E1E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M6.51371 21.2005C4.95422 19.5715 4.00274 17.4554 3.81904 15.2078C3.63533 12.9601 4.23059 10.7176 5.50485 8.85698C6.77912 6.99632 8.65478 5.63076 10.8169 4.9896C12.979 4.34844 15.2959 4.47074 17.3785 5.33595" stroke="#1E1E1E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </a>
                                </form>
                            </div>
                        @endif
                        
                        </td>
                        <td class="text-center align-middle">
                            <div class="flex justify-evenly items-center">
                                <a class="hover:bg-gray-200 p-2 rounded-full flex justify-center items-center" href="/products/{{$product->id}}/edit"> 
                                    <svg width="16" height="16" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.5368 15.834L10.7982 16.3688L11.332 12.6292L20.9464 3.01481C21.3714 2.58983 21.9478 2.35107 22.5488 2.35107C23.1498 2.35107 23.7262 2.58983 24.1512 3.01481C24.5762 3.43979 24.8149 4.01619 24.8149 4.61721C24.8149 5.21823 24.5762 5.79463 24.1512 6.21961L14.5368 15.834Z" stroke="#1E1E1E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M21.0385 15.9488V23.5025C21.0385 23.9032 20.8793 24.2874 20.596 24.5708C20.3127 24.8541 19.9284 25.0132 19.5278 25.0132H4.42029C4.01962 25.0132 3.63535 24.8541 3.35203 24.5708C3.06871 24.2874 2.90955 23.9032 2.90955 23.5025V8.39502C2.90955 7.99435 3.06871 7.61008 3.35203 7.32676C3.63535 7.04344 4.01962 6.88428 4.42029 6.88428H11.974" stroke="#1E1E1E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg> 
                                </a>
                                <form  class="hover:bg-gray-200 p-2 rounded-full flex justify-center items-center"  action="{{ route('products.destroy', ['product' => $product->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="" onclick="event.preventDefault(); this.closest('form').submit();">
                                        <svg width="16" height="16" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20.5029 24.4215H8.30013C7.8378 24.4215 7.39439 24.2378 7.06747 23.9109C6.74055 23.584 6.55688 23.1406 6.55688 22.6783V6.98901H22.2461V22.6783C22.2461 23.1406 22.0625 23.584 21.7355 23.9109C21.4086 24.2378 20.9652 24.4215 20.5029 24.4215Z" stroke="#1E1E1E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M11.7866 19.1917V12.2188" stroke="#1E1E1E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M17.0164 19.1917V12.2188" stroke="#1E1E1E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M3.07031 6.98901H25.7325" stroke="#1E1E1E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M17.0167 3.50244H11.7869C11.3246 3.50244 10.8812 3.6861 10.5543 4.01303C10.2274 4.33995 10.0437 4.78335 10.0437 5.24569V6.98894H18.7599V5.24569C18.7599 4.78335 18.5763 4.33995 18.2494 4.01303C17.9224 3.6861 17.479 3.50244 17.0167 3.50244Z" stroke="#1E1E1E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </a>
                                </form>
                            </div>
                        </td>
                        

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
       
    </div>
</div>
    
@endsection