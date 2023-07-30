<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            User Avatar
        </h2>
    </header>
    <img class="w-20 h-20 rounded-full" style="object-fit: cover; border: 5px solid gray;" src='{{ "/storage/{$user->avatar}" }}' alt="A user avatar">
    <form action="{{ route('profile.avatar.ai')}}" method="post" class="mt-4">
        @csrf
    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
        Generate avatar from AI
    </p>
    <div class="flex items-center gap-4">
    <input type="submit" value="Generate Avatar" class='mt-4 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'>
    </div>
    </form>
    <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">
        Or
    </p>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
    @if (session('message'))
        <div class="mt-2 text-sm text-green-600 dark:text-red-400 space-y-1">
           {{ session('message') }}
        </div>
    @endif
    <form method="post" action="{{ route('profile.avatar') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div>
            <label for="avatar" class="mt-3 block font-medium text-sm text-gray-700 dark:text-gray-300">Upload avatar</label>
            <input type="file" name="avatar" id="avatar" value="{{ old('avatar')}}"   class="mt-3 block w-full" value="{{ old('avatar')}}" autofocus/>
            @if($errors->any())
            <p class="mt-2 text-sm text-red-600 dark:text-red-400 space-y-1">{{ $errors->first('avatar')}}</p>
            @endif
        </div>
        <div class="flex items-center gap-4">
            <input type="submit" name="profile" value="save" class='inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'>
        </div>
    </form>
</section>
