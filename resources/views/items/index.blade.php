<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-8">
                        <form method="get" action="{{ route('items.index') }}">
                            <select name="category">
                                <option value="0">全て</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if (\Request::get('category') == $category->id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <input type="text" name="keyword" value="{{ $keyword }}" placeholder="キーワードを入力">
                            <button name="send" value="send" class="text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded">検索</button>
                        </form>
                    </div>
                    @if (count($items) > 0)
                        @foreach ($items as $item)
                            <ul>
                                <li>
                                    <a href="{{ route('items.show', ['id' => $item->id]) }}">
                                        商品名：{{ $item->name }}&emsp;値段：&yen;{{ number_format($item->price) }}
                                    </a>
                                </li>
                                <li class="mb-8">
                                    <a href="{{ route('items.show', ['id' => $item->id]) }}">
                                        <img src="{{ asset('/images/' . $item->image) }}" alt="{{$item->name}}">
                                    </a>
                                </li>
                            </ul>
                        @endforeach
                    @else
                        <p>該当する商品はありません。</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
