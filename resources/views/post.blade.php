<x-layout>
    <div class="flex justify-center align-middle h-full w-full">
        <div class="bg-stone-700 min-h-fit h-5/6 w-10/12 m-auto p-12 text-white">
            <div class="flex">
                <p class="text-sm font-bold hover:ml-2 w-fit"><a href="/posts" class="mr-auto inline-block">&laquo; Go back</a></p>
                @can('update', $post)
                <div class="inline-block ml-auto ">
                    <a href="/post/{{$post->id}}/edit" class="transition-all ease-in-out text-l cursor-pointer hover:opacity-80 hover:text-green-300 mr-2">
                        Update
                    </a>
                    <form method="POST" action="/post/{{$post->id}}/delete" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button href="" class="transition-all ease-in-out text-l cursor-pointer hover:opacity-80 hover:text-red-300">
                            Delete
                        </button>
                    </form>
                </div>
                @endcan
            </div>
            <p class="text-2xl font-semibold">
                {{$post->title}}
                <span class="text-sm font-light">
                    by {{$post->user->username}}
                </span>
            </p>
            <p class="text-xs font-extralight">
                Created at - {{$post->created_at->format('h:m d/M/Y ')}}
            </p>
            <div class="mt-5 font-light">
                {{$post->body}}
            </div>
        </div>
    </div>
</x-layout>
