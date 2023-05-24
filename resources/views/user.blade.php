<x-layout>
    <div class="flex flex-col w-full h-full justify-center align-middle">
        <div class="m-auto text-white opacity-80">
            <div>
                <img width="250px" height="250px" class="border rounded-full" alt="user-image"/>
            </div>
            <div class="mt-4">
                <p class="w-full text-center font-semibold text-2xl">{{$user->username}}</p>
            </div>
            <div>
                <p>
                    <ul class="flex justify-center gap-2">
                        <li class="hover:opacity-70">
                            <a href="/user/{{$user->username}}/posts">My posts</a>
                        </li>
                        <li class="hover:opacity-70">My friends</li>
                        <li class="hover:opacity-70">Settings</li>
                    </ul>
                </p>
            </div>
        </div>
    </div>
</x-layout>
