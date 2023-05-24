<x-layout>
    <div class="flex align-middle justify-center my-auto">
        @auth
        <h1 class="text-white opacity-95 text-xl">
            Welcome to your hub!

        </h1>
    @else
        <h1 class="text-white opacity-95">
            Login to see your hub!
        </h1>
    @endauth
    </div>
</x-layout>
