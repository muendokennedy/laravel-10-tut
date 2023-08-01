<x-app-layout>
  <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
    <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
      <div class="flex justify-between">
        <div class="flex flex-col justify-center">
          <h1 class="text-black text-lg font-bold">{{$ticket->title}}</h1>
        </div>
        <div class="flex flex-col justify-center">
          <span>{{ $ticket->created_at->diffForHumans() }}</span>
        </div>
      </div>
      <div class="text-black flex justify-between py-4">
        <div class="">
          <p>{{ $ticket->description }}</p>
        </div>
        @if ($ticket->attachment)
        <a href="{{'/storage/' . $ticket->attachment }}" target="_blank">Attachment</a>
        @endif
      </div>
      <div class="flex justify-between">
        <x-primary-button>Edit</x-primary-button>
        <form action="{{ route('ticket.destroy', $ticket->id) }}" method="post">
          @csrf
          @method('delete')
          <x-primary-button>Delete</x-primary-button>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>