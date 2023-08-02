<x-app-layout>
  <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
    <h1 class="text-black text-lg font-bold">Your support tickets</h1>
    @forelse ($tickets as $ticket)
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
        @if ($ticket->attachment)
        <a href="{{'/storage/' . $ticket->attachment }}" target="_blank">Attachment</a>
        @endif
      </div>
      <a href="{{ route('ticket.show', $ticket->id) }}">
        <x-primary-button>view</x-primary-button>
      </a>
    </div>
    @empty
    <p>You don't have any support ticket yet</p>
    @endforelse
  </div>
</x-app-layout>
