<x-layout>
    <div class="text-left mr-auto w-full">

        @foreach ($notes as $note)
            <a class="btn btn-primary ms-1" href="{{ route('note.show', $note) }}">
                <div class="p-5 mb-4  bg-slate-50 px-5 py-5 rounded-3">
                    <p class="text-2xl">{{ $note->title }}</p>
                    <p class="text-base leading-7 text-gray-600">{{ Str::words($note->note, 50) }}</p>
                </div>
            </a>
        @endforeach

        {{ $notes->links() }}

    </div>
</x-layout>
