<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($order->id) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg"
                    x-data = "{
                        dispatched: false,
                        delivered: false,
                        order: null,
                    }"
                    x-init = "
                        Echo.private('orders.{{ $order->id }}')
                        .listen('OrderDispatched', (event) => {
                            order = event.order
                            dispatched = true
                        })
                        .listen('OrderDelivered', (event) => {
                            order = event.order
                            delivered = true
                        })
                    "
            >
                <template  x-if="dispatched">
                    <div class="text-white">
                        Order (#<span x-text="order.id"></span>) has been dispatched
                    </div>
                </template>
                <template  x-if="delivered">
                    <div class="text-white">
                        Order (#<span x-text="order.id"></span>) has been delivered
                    </div>
                </template>
{{--                <x-welcome/>--}}
            </div>
        </div>
    </div>
</x-app-layout>
