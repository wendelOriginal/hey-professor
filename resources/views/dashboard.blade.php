<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

        <x-content>
              <x-form :action="route('question.store')" method="POST">

                        <x-textarea name="question" placeholder="What's question?"/>

                    <x-btn.primary type="submit">Save</x-btn.primary>

                   <x-btn.reset type="reset">Cancel</x-btn.reset>
                </x-form>
            </x-content>
</x-app-layout>
