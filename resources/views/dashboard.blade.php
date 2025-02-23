<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{--            <div--}}
            {{--                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg"--}}
            {{--                    x-data = "{--}}
            {{--                        dispatched: false,--}}
            {{--                        delivered: false,--}}
            {{--                        order: null,--}}
            {{--                    }"--}}
            {{--                    x-init = "--}}
            {{--                        Echo.private('users.{{ auth()->id() }}')--}}
            {{--                        .listen('OrderDispatched', (event) => {--}}
            {{--                            order = event.order--}}
            {{--                            dispatched = true--}}
            {{--                        })--}}
            {{--                        .listen('OrderDelivered', (event) => {--}}
            {{--                            order = event.order--}}
            {{--                            delivered = true--}}
            {{--                        })--}}
            {{--                    "--}}
            {{--            >--}}
            {{--                <template  x-if="dispatched">--}}
            {{--                    <div class="text-white">--}}
            {{--                        Order (#<span x-text="order.id"></span>) has been dispatched--}}
            {{--                    </div>--}}
            {{--                </template>--}}
            {{--                <template  x-if="delivered">--}}
            {{--                    <div class="text-white">--}}
            {{--                        Order (#<span x-text="order.id"></span>) has been delivered--}}
            {{--                    </div>--}}
            {{--                </template>--}}
            <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg"
                    x-data="{
                        userPositions: []
                    }"
                    x-init="
                    const channel = Echo.private('app')
                    let width = window.innerWidth
                    let height = window.innerHeight
                    channel.listenForWhisper('mousemove', (event) => {
                        const user = userPositions.find(p => p.user.id === event.user.id)
                        if (typeof user == 'undefined'){
                            userPositions.push(event)
                            return
                        }
                        user.position = {
                                x: event.position.x * width,
                                y: event.position.y * height
                            }
                        console.log(userPositions)
                    })
                    onmousemove = (e) => {
                        channel.whisper('mousemove',{
                            user: {{json_encode(auth()->user()->only(['id','name']))}},
                            position: {
                                x: e.x / width,
                                y: e.y / height
                            }
                        })
                    }
                    "
            >

                <template x-for="user in userPositions">
                    <div class="flex items-center text-white absolute leading-none h-3 space-x-1"
                         x-bind:style="`left: ${user.position.x}px; top: ${user.position.y}px;`">
                        <svg fill="none" preserveAspectRatio="none" viewBox="5 5 14 14" class="  size-3">
                            hi
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="1.5"
                                  d="M5.75 5.75L11 18.25L13 13L18.25 11L5.75 5.752"></path>
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="1.5"
                                  d="M13 13L18.25 18.25"></path>
                        </svg>
                        <span class="text-sm font-semibold" x-text="user.user.name"></span>
                    </div>
                </template>
            </div>
        </div>
    </div>
</x-app-layout>
