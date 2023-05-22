<x-layout>
    @auth
        <h1 class="text-white">logged in</h1>
    @else
        <h1 class="text-white">logged out</h1>
    @endauth
</x-layout>
