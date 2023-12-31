<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        {{-- Flash message library --}}
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
            };
        </script>
        <title>My Laravel Projects</title>
    </head>

    <body class="mb-48">
        <x-flash-message></x-flash-message>
        <nav class="flex justify-between items-center mb-4">
            <a href="/">
                <img src="{{ asset('images/logo-la.png') }}" class="w-24" alt="Logo">
            </a>

            <ul class="flex space-x-6 mr-6 text-lg">
                @auth
                    <li class="">
                        <span class=" ">Welcome <span class="uppercase text-red-500">{{ auth()->user()->name }}</span></span>
                    </li>
                    <li>
                        <a href="/products/manage" class="hover:text-laravel">
                            <i class="fa-solid fa-gear text-red-500"></i> Manage
                        </a>
                    </li>
                    <li>
                        <form action="/logout" method="POST" class="inline">
                            @csrf
                            <button type="submit"> <i class="fa-solid fa-door-closed text-red-500"></i> Logout</button>
                        </form>
                    </li>

                    @else
                    <li>
                        <a href="/register" class="hover:text-laravel">
                            <i class="fa-solid fa-user-plus text-red-500"></i> Register
                        </a>
                    </li>
                    <li>
                        <a href="/login" class="hover:text-laravel">
                            <i class="fa-solid fa-arrow-right-to-bracket text-red-500"></i> Login
                        </a>
                    </li>
                @endauth
            </ul>
        </nav>
        <main>
            {{ $slot }}
          
        </main>
        <footer
            class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-14 mt-24 opacity-80 md:justify-center"
        >
            <p class="ml-2">Copyright &copy; 2023, All Rights reserved</p>
            @auth
                <a
                    href="products/create "
                    class="absolute top-1/5 right-10 bg-white text-black hover:bg-black hover:text-white py-2 px-5"
                    >Post Product</a
                >
                @else
                <a
                href="/login"
                class="absolute top-1/5 right-10 bg-white text-black hover:bg-black hover:text-white py-2 px-5"
                >Post Product</a
                >  
            @endauth
        </footer>
    </body>
</html>