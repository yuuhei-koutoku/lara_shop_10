<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品詳細
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul>
                        <li>商品ID：{{ $item->id }}</li>
                        <li>商品名：{{ $item->name }}</li>
                        <li>値段：&yen;{{ number_format($item->price) }}</li>
                        <li>詳細：{{ $item->detail }}</li>
                        <li>
                            <img src="{{ asset('/images/' . $item->image) }}" alt="{{ $item->name }}" class="mb-8">
                        </li>
                    </ul>
                    <form method="post" action="{{ route('cart.add') }}">
                        @csrf
                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                        <button class="text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded mb-4">
                            カートに入れる
                        </button>
                    </form>
                    <button onclick="window.location='{{ route('items.index') }}'" class="text-white bg-gray-400 border-0 py-2 px-6 focus:outline-none hover:bg-gray-500 rounded">
                        商品一覧に戻る
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
