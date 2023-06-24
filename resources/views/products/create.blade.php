@extends('dashboard')

@section('products-content')
    <div class=" bg-slate-600 border border-gray-600 shadow-md shadow-slate-300 m-4 py-6">
        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="flex flex-col w-2/4 justify-center items-stretch  mx-auto px-1 md:px-5 space-y-2">
                <h2 class="text-gray-900 dark:text-white text-center text-2xl" >Add Product</h2>

                <label 
                    for="product_name" 
                    class="text-gray-900 dark:text-white" 
                >
                    Product Name:
                </label>
                <input 
                    id="product_name" 
                    type="text" 
                    class="form-control @error('product_name') is-invalid @enderror" 
                    name="product_name" 
                    value="{{ old('product_name') }}" 
                    required 
                    autocomplete="product-name" 
                    autofocus 
                    placeholder="Enter Product Name"
                /> 

                    @error('product_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    
                <label for="product_description" class="text-gray-900 dark:text-white" >Product Description:</label>
                <input 
                    id="product_description" 
                    type="text" 
                    class="form-control @error('product_description') is-invalid @enderror" 
                    name="product_description" 
                    value="{{ old('product_description') }}" 
                    required 
                    autocomplete="product-description" 
                    autofocus 
                    placeholder="Enter Product Description" 
                /> 

                    @error('product_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                <label for="product_image" class="text-gray-900 dark:text-white" >Product Image:</label>
                <input id="product_image" type="file" class="text-gray-900 dark:text-white form-control-file @error('product_image') is-invalid @enderror" name="product_image" accept="image/*">

                    @error('product_image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                <label for="quantity" class="text-gray-900 dark:text-white" >Quantity:</label>
                <input 
                    id="quantity" 
                    type="number" 
                    class="form-control @error('quantity') is-invalid @enderror" 
                    name="quantity" 
                    value="{{ old('quantity') }}" 
                    required 
                    autocomplete="quantity" 
                    autofocus 
                    placeholder="Enter Quantity" 
                /> 

                    @error('quantity')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                <label for="price" class="text-gray-900 dark:text-white" >Price:</label>
                <input 
                    id="price" 
                    type="number" 
                    class="form-control @error('price') is-invalid @enderror" 
                    name="price" value="{{ old('price') }}" 
                    required 
                    autocomplete="price" 
                    autofocus 
                    placeholder="Enter price" 
                /> 

                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                {{-- <label for="name" class="text-gray-900 dark:text-white" >Upload Profile Picture:</label>
                <input id="profile_picture" type="file" class="text-gray-900 dark:text-white form-control-file @error('profile_picture') is-invalid @enderror" name="profile_picture" accept="image/*">

                    @error('profile_picture')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror --}}

                <button type="submit" class="text-white w-60 p-2 mx-auto bg-blue-800 hover:bg-blue-900"> Add Product </button>
            </div>
        </form>

    </div>

    
@endsection