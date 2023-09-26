<x-layout>
    <x-card class=" p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Login
            </h2>
            <p class="mb-4">Login into your account to post products</p>
        </header>

        <form action="/users/authenticate" method="POST">
            @csrf
            <x-form-input name='email'  type='text' label='Email'  />
            <x-form-input name='password'  type='password' label='Password'  />
            <x-button action1="Sign In" message=" Don't have an account? " redirect='register_screen' action2='Register' />
        </form>
    </x-card>
</x-layout>