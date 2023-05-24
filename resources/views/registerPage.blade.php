<x-layout>
    <div class="w-6/12 h-6/12 bg-stone-800 bg-opacity-80 rounded-md m-auto text-white opacity-90 p-12">
        <form action="/register" method="POST" class="flex flex-col  justify-center align-middle">
            <div class="mx-auto w-10/12">

                @csrf
                <div class="flex flex-col w-full h-8/12 mt-5 gap-3">
                    <x-input type="text" placeholder="Username" name="username" value="{{old('username')}}"/>
                    @error('username')
                        <x-errorMessage>
                            {{$message}}
                        </x-errorMessage>
                    @enderror
                    <x-input type="email" placeholder="Email" name="email" value="{{old('email')}}"/>
                    @error('email')
                        <x-errorMessage>
                            {{$message}}
                        </x-errorMessage>
                    @enderror
                    <x-input type="password" placeholder="Password" name="password"/>
                    @error('password')
                        <x-errorMessage>
                            {{$message}}
                        </x-errorMessage>
                    @enderror
                    <x-input placeholder='ConfirmPassword' type="password"  name="password_confirmation" />
                    @error('password_confirmation')
                        <x-errorMessage>
                            {{$message}}
                        </x-errorMessage>
                    @enderror
                </div>
                <div class="grid grid-cols-1 grid-rows-2 md:grid-cols-2 md:grid-rows-1">
                    <div class="flex justify-start">
                        <x-button :class='"mt-auto transition-all ease-in-out hover:ml-1"'>
                            REGISTER
                            <i class="fa-solid fa-arrow-right " style="color: #ffffff;"></i>
                        </x-button>
                    </div>
                    <div class="flex flex-col md:ml-auto mt-4">
                        <label for="btn_register" class="font-light mr-auto text-left md:text-right md:ml-auto md:mr-0">
                            Already has an account?
                        </label>
                        <a id="btn_register" class="text-2xl mr-auto text-right transition-all ease-in-out md:hover:mr-2 hover:ml-2 md:hover:ml-0 md:ml-auto md:mr-0" href="{{route("login")}}">
                            Login
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-layout>
