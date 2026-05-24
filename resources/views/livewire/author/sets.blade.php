<div class="mx-auto max-w-6xl px-4  sm:px-6 lg:px-8">
    <!-- Create Set -->
    <div class="mb-10 overflow-hidden rounded-3xl border border-zinc-200 bg-white shadow-sm">
        <div class="border-b border-zinc-100 px-6 py-5">
            <h2 class="text-lg font-semibold text-zinc-900">
                Новый набор
            </h2>
            <p class="mt-1 text-sm text-zinc-500">
                Название и краткое описание для вашего набора карточек.
            </p>
        </div>
        <form wire:submit="save" class="space-y-6 p-6">
            <!-- Title -->
            <div class="space-y-2">
                <label class="text-sm font-medium text-zinc-700">
                    Название набора
                </label>
                <input wire:model="title" type="text" class="w-full rounded-2xl border border-zinc-200 bg-zinc-50 px-4 py-3 text-sm text-zinc-900 outline-none transition duration-200 placeholder:text-zinc-400 focus:border-zinc-900 focus:bg-white">
            </div>

            <!-- Description -->
            <div class="space-y-2">
                <label class="text-sm font-medium text-zinc-700">
                    Описание
                </label>
                <textarea wire:model="description" rows="4" class="w-full resize-none rounded-2xl border border-zinc-200 bg-zinc-50 px-4 py-3 text-sm text-zinc-900 outline-none transition duration-200 placeholder:text-zinc-400 focus:border-zinc-900 focus:bg-white"></textarea>
            </div>

            <!-- Submit -->
            <div class="flex justify-end">
                <button type="submit" class="inline-flex items-center justify-center rounded-2xl bg-zinc-900 px-5 py-3 text-sm font-medium text-white transition duration-200 hover:bg-zinc-700 active:scale-[0.98]">
                    Создать набор
                </button>
            </div>
        </form>
    </div>

    <!-- Sets Grid -->
    <div class="grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-3">
        @forelse($sets as $set)
            <div class="group flex flex-col justify-between rounded-3xl border border-zinc-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-zinc-300 hover:shadow-lg">
                <div>
                    <h3 class="text-xl font-semibold tracking-tight text-zinc-900">
                        {{ $set->title }}
                    </h3>
                    @if($set->description)
                        <p class="mt-3 line-clamp-3 text-sm leading-relaxed text-zinc-500">
                            {{ $set->description }}
                        </p>
                    @endif
                </div>

                <div class="mt-8 flex items-center justify-between border-t border-zinc-100 pt-5">
                    <a href="{{ route('author.cards', $set->id) }}" class="inline-flex items-center gap-2 text-sm font-medium text-zinc-900 transition hover:gap-3">
                        Редактировать
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-full rounded-3xl border border-dashed border-zinc-300 bg-white py-20 text-center">
                <div class="mx-auto max-w-sm">
                    <h3 class="text-lg font-semibold text-zinc-900">
                        Пока нет наборов
                    </h3>
                    <p class="mt-2 text-sm leading-relaxed text-zinc-500">
                        Создайте свой первый набор карточек для начала обучения.
                    </p>
                </div>
            </div>
        @endforelse
    </div>
</div>