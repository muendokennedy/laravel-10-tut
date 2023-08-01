<x-app-layout>
  <x-guest-layout>
    <header>
      <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
        Edit your ticket hear
      </h2>
    </header>
    @if (session('message'))
    <div class="mt-2 text-sm text-green-600 dark:text-red-400 space-y-1">
      {{ session('message') }}
    </div>
    @endif
    <form method="POST" action="{{ route('ticket.update', $ticket->id) }}" enctype="multipart/form-data">
      @csrf
      @method('patch')
      <!-- The title -->
      <div>
        <x-input-label for="title" :value="__('Title')" />
        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{$ticket->title}}"
          autofocus />
        @if($errors->any())
        <p class="mt-2 text-sm text-red-600 dark:text-red-400 space-y-1">{{ $errors->first('title')}}</p>
        @endif
      </div>
      <div>
        <x-input-label for="description" :value="__('Description')" />
        <x-textarea name="description" id="description" value="{{$ticket->description}}" />
        @if($errors->any())
        <p class="mt-2 text-sm text-red-600 dark:text-red-400 space-y-1">{{ $errors->first('description')}}</p>
        @endif
      </div>
      <div>
      @if ($ticket->attachment)
        <a href="{{'/storage/' . $ticket->attachment }}" target="_blank">see attachment</a>
        @endif
        <label for="attachment" class="mt-3 block font-medium text-sm text-gray-700 dark:text-gray-300">Attachment(If
          any)</label>
        <x-file-input name="attachment" id="attachment" value="{{ old('attachment')}}" />
        @if($errors->any())
        <p class="mt-2 text-sm text-red-600 dark:text-red-400 space-y-1">{{ $errors->first('attachment')}}</p>
        @endif
      </div>

      <div class="flex items-center justify-end mt-4">
        <x-primary-button class="ml-3">
          edit ticket
        </x-primary-button>
      </div>
    </form>
  </x-guest-layout>
</x-app-layout>
