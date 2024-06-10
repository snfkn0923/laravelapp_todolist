<!DOCTYPE html>
<html>

<head>
    <title>Laravel ToDo List</title>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/js/app.js" defer></script>
</head>

<body>
    <div class="bg-gray-200 p-4">
        <div class="lg:w-2/4 mx-auto py-8 px-6 bg-white rounded-xl">
            <h1 class="font-bold text-2xl mb-8">新規作成</h1>
            <div class="mb-6">
                <form class="flex flex-col space-y-4" action="{{ route('store') }}" method="POST">
                    @csrf
                    <input type="text" name="title" placeholder="タイトル" class="py-3 px-4 bg-gray-100 rounded-xl">
                    <textarea name="description" id="" cols="30" rows="3" placeholder="概要"
                        class="py-3 px-4 bh-gray-100 rounded-xl"></textarea>
                    <button type="submit" class="w-28 py-4 px-5 bg-green-500 text-white rounded-xl">登録</button>
                </form>
                <h1 class="font-bold text-2xl mb-2 mt-2">To Do リスト</h1>
                <hr>
                <div class="mt-2">
                    @forelse ($todolists as $todo)
                        <div @class([
                            'py-4 flex items-center border-b border-gray-300 px-3',
                            $todo->isDone ? 'bg-green-200' : '',
                        ])>
                            <div class="flex-1 pr-8">
                                <h3 class="text-lg font-semibold">{{ $todo->title }}</h3>
                                <p class="tex-gray-500">{{ $todo->description }}</p>
                            </div>

                            <div class="flex space-x-3">
                                <a href="{{ route('edit', $todo->id) }}"
                                    class="btn btn-blue py-2 px-2 bg-blue-500 text-white rounded-xl">編集</a>
                                <form method="POST" action="{{ route('complete', $todo->id) }}">
                                    @csrf
                                    <button type="submit" class="py-2 px-2 bg-green-500 text-white rounded-xl">完了
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('delete', $todo->id) }}">
                                    @csrf
                                    <button type="submit" class="py-2 px-2 bg-red-500 text-white rounded-xl">削除
                                    </button>
                                </form>
                            </div>
                        </div>

                    @empty
                        <div class="py-4 flex items-center border-b border-gray-300 px-3">
                            <h3 class="text-lg font-semibold">To Do リストはありません</h3>
                        </div>
                    @endforelse
                    {{-- @foreach ($todolists as $todo)
                        <div @class([
                            'py-4 flex items-center border-b border-gray-300 px-3',
                            $todo->isDone ? 'bg-green-200' : '',
                        ])>
                            <div class="flex-1 pr-8">
                                <h3 class="text-lg font-semibold">{{ $todo->title }}</h3>
                                <p class="tex-gray-500">{{ $todo->description }}</p>
                            </div>

                            <div class="flex space-x-3">
                                <a href="{{ route('edit', $todo->id) }}"
                                    class="btn btn-blue py-2 px-2 bg-blue-500 text-white rounded-xl">編集</a>
                                <form method="POST" action="{{ route('complete', $todo->id) }}">
                                    @csrf
                                    <button type="submit" class="py-2 px-2 bg-green-500 text-white rounded-xl">完了
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('delete', $todo->id) }}">
                                    @csrf
                                    <button type="submit" class="py-2 px-2 bg-red-500 text-white rounded-xl">削除
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach --}}
                </div>
            </div>
        </div>
</body>

</html>
