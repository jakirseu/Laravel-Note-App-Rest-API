<x-layout>
    <div class="w-full bg-slate-50 px-5 py-5">
        <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl"> {{ $note->title }}</h1>
        <p class="mt-6 text-base leading-7 text-gray-600"> {{ $note->note }}</p>

        <div class="flex justify-between mt-10  ">

            <a href="{{ route('note.edit', $note, $note) }}"
                class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                Edit </a>

            <form action="{{ route('note.destroy', $note) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-red-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-red-900 hover:bg-red-800">
                    Delete
                </button>
            </form>

        </div>
    </div>
</x-layout>
