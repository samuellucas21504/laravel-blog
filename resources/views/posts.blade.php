<x-layout>
    <div class="flex flex-col justify-center align-middle w-full min-fit my-4">
        @if(session()->has('success'))
        <p class="text-green-200 font-light border border-emerald-500 bg-emerald-500 w-3/6 rounded-md text-center mx-auto mb-2">
            {{session('success')}}
        </p>
        @endif
        @isset($posts)
            @foreach($posts as $post)
            <div class="bg-stone-700 border border-stone-700 rounded-md w-8/12 mx-auto my-2 text-white opacity-80 p-4 cursor-pointer transition-all ease-in-out hover:bg-stone-400 ">
                <a href="/post/{{$post->id}}">
                    <p class="text-center font-semibold">
                        {{$post->title}}
                    </p>
                    <p class="text-center">
                        <span class="font-light">Posted by {{$post->user->username}} - {{$post->created_at->format('d/m/Y')}}</span>
                    </p>
                </a>
            </div>
            @endforeach
        @else
        <div class="flex justify-center align-middle flex-col m-auto w-full h-full text-white opacity-80">
            <div class="w-2/12 h-2/12 m-auto mb-5">
                <img src="{{url('/images/lost.svg')}}" alt="Svg repo lost"/>
            </div>
            <p class="m-auto font-light">There is nothing here!</p>
        </div>
        @endisset
    </div>
</x-layout>
