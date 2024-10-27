<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Room: {{ __($room->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg"
                    x-data="{
                        AllUsers: []
                    }"
                    x-init="
                    Echo.join('room.{{$room->id}}')
                    .here((users) => {
                        AllUsers = users;
                    })
                    .joining(user =>{
                        AllUsers.push(user)
                    })
                    .leaving(user =>{
                        AllUsers = AllUsers.filter( u => u.id !== user.id)
                    })
                    "
            >

                {{--                <x-welcome/>--}}
                <div>
                    <h2 class="font-semibold text-white text=lg">
                        Users here
                    </h2>
                    <template x-for="user in AllUsers">
                        <div class="font-semibold text-white text-sm "
                         x-text="user.name"
                        >

                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
