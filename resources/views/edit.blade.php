<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="bg-gray-200 p-4">
        <div class="lg:w-2/4 mx-auto py-8 px-6 bg-white rounded-xl">
            <h1 class="font-bold text-2xl mb-8">タスク編集</h1>
            <div class="mb-6">
                <form class="flex flex-col space-y-4" action="{{ route('update', $editData->id) }}" method="POST">
                    @csrf
                    <input type="text" name="title" placeholder="タイトル" class="py-3 px-4 bg-gray-100 rounded-xl"
                        value="{{ $editData->title }}">
                    <textarea name="description" id="" cols="30" rows="3" placeholder="概要"
                        class="py-3 px-4 bh-gray-100 rounded-xl">{{ $editData->description }}</textarea>
                    <button type="submit" class="w-28 py-4 px-5 bg-green-500 text-white rounded-xl">更新</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
