<x-layout>
    <form action="/post/create" method="POST" class="flex justify-center align-middle m-auto text-white opacity-80 w-8/12 md:w-6/12 h-3/4"  >
        @csrf
        <div class="bg-stone-800 border border-stone-800 rounded-md w-full h-full flex flex-col align-middle pt-20 pb-20">
            <p class="text-white mx-auto font-semibold text-xl">Post</p>
            <div class="w-8/12 mx-auto mt-4">
                <x-input type="text" placeholder="Title" name="title" id="title"/>
                @error('title')
                    <p>
                        {{$message}}
                    </p>
                @enderror
            </div>
            <div class="w-8/12 h-full mx-auto mt-4">
                <textarea class="rounded placeholder-gray-600 p-4 w-full h-full text-stone-950 outline-0 focus:border-blue-600"
                placeholder="Type your post body here!" name="body">{{old('title')}}</textarea>
            </div>
            <div class="mx-auto mt-2">
                <x-button type="submit" class="text-white w-fit hover:opacity-100 hover:text-white">Submit</x-button>
            </div>
        </div>
    </form>
</x-layout>
