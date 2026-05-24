<div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
    <!-- Header -->
    <div class="mb-10">
        <a href="{{ route('author.sets') }}" class="mb-5 inline-flex items-center gap-2 text-sm font-medium text-zinc-500 transition hover:text-zinc-900">
            Назад к наборам
        </a>
        <div class="space-y-3">
            <h1 class="text-4xl font-bold tracking-tight text-zinc-900">
                {{ $set->title }}
            </h1>

            @if($set->description)
                <p class="max-w-2xl text-base leading-relaxed text-zinc-500">
                    {{ $set->description }}
                </p>
            @endif
        </div>
    </div>

    <!-- Add Card Form -->
    <div class="mb-10 overflow-hidden rounded-3xl border border-zinc-200 bg-white shadow-sm">
        <div class="border-b border-zinc-100 px-6 py-5">
            <h2 class="text-lg font-semibold text-zinc-900">
                Новая карточка
            </h2>
        </div>

        <form wire:submit="add" class="space-y-6 p-6">
            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                <!-- Front -->
                <div class="space-y-2">
                    <label class="text-sm font-medium text-zinc-700">
                        Передняя сторона
                    </label>
                    <input wire:model="front_text" type="text" class="w-full rounded-2xl border border-zinc-200 bg-zinc-50 px-4 py-3 text-sm text-zinc-900 outline-none transition duration-200 placeholder:text-zinc-400 focus:border-zinc-900 focus:bg-white">
                </div>

                <!-- Back -->
                <div class="space-y-2">
                    <label class="text-sm font-medium text-zinc-700">
                        Задняя сторона
                    </label>
                    <input wire:model="back_text" type="text" class="w-full rounded-2xl border border-zinc-200 bg-zinc-50 px-4 py-3 text-sm text-zinc-900 outline-none transition duration-200 placeholder:text-zinc-400 focus:border-zinc-900 focus:bg-white">
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="inline-flex items-center justify-center rounded-2xl bg-zinc-900 px-5 py-3 text-sm font-medium text-white transition duration-200 hover:bg-zinc-700 active:scale-[0.98]">
                    Добавить карточку
                </button>
            </div>
        </form>
    </div>

    <!-- Cards -->
    <div class="space-y-3">
        @forelse($cards as $card)
            <div class="group flex items-center justify-between rounded-2xl border border-zinc-200 bg-white px-5 py-4 shadow-sm transition duration-200 hover:border-zinc-300 hover:shadow-md">
                <div class="grid w-full grid-cols-1 gap-4 md:grid-cols-2">
                    <div class="space-y-1">
                        <p class="text-xs font-medium uppercase tracking-wide text-zinc-400">
                            Передняя сторона
                        </p>
                        <p class="text-base font-semibold text-zinc-900">
                            {{ $card->front_text }}
                        </p>
                    </div>
                    <div class="space-y-1">
                        <p class="text-xs font-medium uppercase tracking-wide text-zinc-400">
                            Задняя сторона
                        </p>
                        <p class="text-base text-zinc-600">
                            {{ $card->back_text }}
                        </p>
                    </div>
                </div>

                <form action="{{ route('cards.destroy', $card->id) }}" method="POST" onsubmit="return confirm('Удалить карточку?')" class="ml-6">
                    @csrf
                    @method('DELETE')
                    <button class="rounded-xl px-3 py-2 text-sm font-medium text-zinc-400 opacity-0 transition duration-200 hover:bg-zinc-100 hover:text-red-500 group-hover:opacity-100">
                        Удалить
                    </button>
                </form>
            </div>
        @empty
            <div class="rounded-3xl border border-dashed border-zinc-300 bg-white py-16 text-center">
                <p class="text-sm text-zinc-500">
                    В этом наборе пока нет карточек.
                </p>
            </div>
        @endforelse
    </div>
</div>