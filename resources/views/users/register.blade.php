<x-layout>
    <x-card class=" p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Register
            </h2>
            <p class="mb-4">Create an account to post products</p>
        </header>

        <form action="/users" method="POST">
            @csrf
            <x-form-input name='name'  placeholder="Your Name" type='text' label='Name'  />
            <x-form-input name='email'  placeholder="Your Email" type='text' label='Email'  />
            <x-form-input name='password'  placeholder="Your Password" type='password' label='Password'  />
            <x-form-input name='password_confirmation' placeholder="Confirm password" type='password' label='Confirm Password'  />
            <x-button action1="Sign Up" message=" Already have an account?" redirect='login' action2='Login' />
        </form>
    </x-card>
</x-layout>