<x-layout>
    <div class="w-full bg-slate-50 px-5 py-5">
        <form class="space-y-5" action="{{ route('note.store') }}" method="POST">
            @csrf
            <h3>Add new note</h3>

            <input type="text" id="title" name="title"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Note Title">
                @error('title')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">{{ $message }}</div>
                @enderror

            <textarea id="note" name="note" rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Write your thoughts here..."></textarea>

                @error('note')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">{{ $message }}</div>
                @enderror

            <button type="submit"
                class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                Save note
            </button>
        </form>
    </div>
</x-layout>
