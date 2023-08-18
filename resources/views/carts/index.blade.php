<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            カート
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (count($cart_items) > 0)
                        @foreach($cart_items as $cart_item)
                            <ul>
                                <li>
                                    商品名：{{ $cart_item->name }}&emsp;
                                    値段：&yen;{{ number_format($cart_item->price) }}&emsp;
                                </li>
                                <li>
                                    <img src="{{ asset('/images/' . $cart_item->image) }}" alt="{{ $cart_item->image }}">
                                </li>
                                <li class="mb-8">
                                    <form id="delete_{{ $cart_item->id }}" method="post" action="{{ route('cart.softDelete', ['id' => $cart_item->id]) }}">
                                        @csrf
                                        @method('delete')
                                        <a href="#" data-id="{{ $cart_item->id }}" onclick="deletePost(this)" class="text-white bg-red-400 border-0 px-1 focus:outline-none hover:bg-red-500 rounded">
                                            削除
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        @endforeach
                        <p>合計金額：&yen;{{ number_format($total_price) }}</p>
                    @else
                        カートに商品は入っていません。
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        function deletePost(e) {
            'use strict';
            if (confirm('本当に削除してもよろしいですか？')) {
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script>
</x-app-layout>
