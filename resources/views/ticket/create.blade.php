<x-app-layout>
    <x-guest-layout>
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Create a new support ticket
            </h2>
        </header>
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>
        @if (session('message'))
            <div class="mt-2 text-sm text-green-600 dark:text-red-400 space-y-1">
               {{ session('message') }}
            </div>
        @endif
        <form method="POST" action="{{ route('ticket.store') }}" enctype="multipart/form-data">
            @csrf
            <!-- The title -->
            <div>
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')"  autofocus />
                @if($errors->any())
                <p class="mt-2 text-sm text-red-600 dark:text-red-400 space-y-1">{{ $errors->first('title')}}</p>
                @endif
            </div>
            <div>
                <x-input-label for="description" :value="__('Description')" />
                <x-textarea name="description" id="description"/>
                @if($errors->any())
                <p class="mt-2 text-sm text-red-600 dark:text-red-400 space-y-1">{{ $errors->first('description')}}</p>
                @endif
            </div>
            <div>
                <label for="attachment" class="mt-3 block font-medium text-sm text-gray-700 dark:text-gray-300">Attachment(If any)</label>
                <x-file-input name="attachment" id="attachment" value="{{ old('attachment')}}"/>
                @if($errors->any())
                <p class="mt-2 text-sm text-red-600 dark:text-red-400 space-y-1">{{ $errors->first('attachment')}}</p>
                @endif
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    create ticket
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>
</x-app-layout>


