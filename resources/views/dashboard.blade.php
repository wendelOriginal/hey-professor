<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <x-content>
        <x-form :action="route('question.store')" method="POST">

                  <x-textarea name="question" placeholder="What's question?"/>
                  @error('question')
                      <span class="mt-2 text-sm text-red-500">
                          {{ $message }}
                      </span>
                  @enderror

              <x-btn.primary type="submit">Save</x-btn.primary>

             <x-btn.reset type="reset">Cancel</x-btn.reset>
          </x-form>

          <hr class="my-6 border-gray-800"/>

          <div class="flex flex-col w-full">
              <h1 class="mb-6 text-xl dark:text-gray-600">List of question</h1>
              @foreach($questions as $question)
                  <x-card :question="$question" />
              @endforeach
          </div>

      </x-content>


</x-app-layout>
