@props(
    [
        'question'
    ]
)

<div class="flex items-center bg-slate-900 justify-between px-4 py-2 my-2 border-gray-800 rounded-lg shadow-lg shadow-blue-950 dark:bg-gray-950 dark:text-gray-700">
    <span>{{ $question->question }}</span>

    <div>
        <x-form :action="route('question.like', $question)" method="POST">
            <div class="flex flex-row items-center justify-start space-x-4">

                <div class="flex flex-row items-center justify-start space-x-2">
                    <button type="submit">
                        <x-icons.thumbs-up class="w-5 h-5 text-green-500 cursor-pointer hover:text-green-900 "/>
                        </button>
                   <span class="text-green-500">{{ $question->likes }}</span>
                </div>

                <div class="flex flex-row items-center justify-start space-x-2">
                    <button type="submit">
                        <x-icons.thumbs-down class="w-5 h-5 text-red-500 cursor-pointer hover:text-red-900 "/>
                        </button>
                   <span class="text-red-500">{{ $question->likes }}</span>
                </div>
            </div>
        </x-form>


    </div>
</div>
