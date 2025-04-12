<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">

            <form action="{{ route('question.store') }}" method="POST">
                @csrf
                <div class="max-w-sm mx-auto">
                    <div class="mb-4">
                        <textarea name="question" id="message" rows="4" class="block p-2.5 w-full text-sm
                        text-gray-900 bg-gray-50 rounded-lg border
                        border-gray-300 focus:ring-blue-500
                        focus:border-blue-500 dark:bg-gray-700
                            dark:border-gray-600 dark:placeholder-gray-400
                            dark:text-white
                        dark:focus:ring-blue-500
                        dark:focus:border-blue-500" placeholder="What's Question ?"></textarea>

                        @error('question')
                            <span class="mt-2 text-sm text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4
                    focus:ring-blue-300 font-medium rounded-lg
                    text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600
                    dark:hover:bg-blue-700 focus:outline-none
                    dark:focus:ring-blue-800">Save</button>

                    <button type="reset" class="py-2.5 px-5 me-2 mb-2
                    text-sm font-medium text-gray-900
                     focus:outline-none bg-white rounded-lg
                     border border-gray-200 hover:bg-gray-100
                     hover:text-blue-700 focus:z-10 focus:ring-4
                      focus:ring-gray-100 dark:focus:ring-gray-700
                       dark:bg-gray-800 dark:text-gray-400
                        dark:border-gray-600 dark:hover:text-white 
                        dark:hover:bg-gray-700 mr-6">Reset</button>
                </div>
            </form>

    </div>
</x-app-layout>
