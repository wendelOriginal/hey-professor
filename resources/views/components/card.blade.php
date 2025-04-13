@props(
    [
        'question'
    ]
)

<div class="w-3/5 p-4 my-2 border-gray-800 rounded-lg shadow-lg shadow-blue-950 dark:bg-gray-950 dark:text-gray-700">
    {{ $question->question }}
</div>