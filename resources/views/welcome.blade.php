<x-guest-layout>
    <div class="flex flex-col justify-center items-center gap-4 py-8 px-4">
        <div class="text-2xl" >Hello, FlowerStore PH</div>
        <div class="text-3xl">I'm Saul Darius Hernandez</div>
        <div class="text-sm">This is my e-commerce webpage exam</div>
        <div class="text-base text-center" > Kindly <strong><a href="/register">Register</a></strong> 2 accounts first then change <strong>status</strong> of the 2nd account to <strong>1</strong> directly to the database to set it as admin. Then proceed to <strong><a href="/login">Login</a></strong>. Thank you!</div>

        <div class="flex gap-4 mt-4">
            <a href="{{ route('login') }}" class="text-white px-10 text-center py-2 bg-blue-800 hover:bg-blue-900">Login</a>

            <a href="{{ route('register') }}" class="text-white px-8 text-center py-2 bg-blue-800 hover:bg-blue-900">Register</a>
        


        </div>
    </div>

</x-guest-layout>