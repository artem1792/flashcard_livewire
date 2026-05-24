<div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
    <!-- Top -->
    <div class="mb-10 text-center">
        <a href="{{ route('student.sets') }}" class="mb-6 inline-flex items-center gap-2 text-sm font-medium text-zinc-500 transition hover:text-zinc-900">
            Вернуться к наборам
        </a>

        <div class="space-y-3">
            <h1 class="text-4xl font-bold tracking-tight text-zinc-900">
                {{ $set->title }}
            </h1>
        </div>
    </div>

    @if($set->cards->count() > 0)
        <!-- Flashcard -->
        <div class="mx-auto max-w-2xl">
            <div wire:click="toggleFlip" class="group cursor-pointer select-none perspective">
                <div class="relative h-[420px] w-full transition-all duration-500 [transform-style:preserve-3d] {{ $isFlipped ? '[transform:rotateY(180deg)]' : '' }}">
                    <!-- Front -->
                    <div class="absolute inset-0 flex flex-col rounded-[2rem] border border-zinc-200 bg-white p-8 shadow-[0_10px_40px_rgba(0,0,0,0.04)] backface-hidden">
                        <div class="flex flex-1 items-center justify-center">
                            <h2 class="text-center text-4xl font-bold tracking-tight text-zinc-900 md:text-5xl">
                                {{ $set->cards[$currentIndex]->front_text }}
                            </h2>
                        </div>
                    </div>

                    <!-- Back -->
                    <div class="absolute inset-0 flex flex-col rounded-[2rem] border border-zinc-200 bg-zinc-900 p-8 text-white shadow-[0_10px_40px_rgba(0,0,0,0.08)] [transform:rotateY(180deg)] backface-hidden">
                        <div class="flex flex-1 items-center justify-center">
                            <h2 class="text-center text-4xl font-bold tracking-tight md:text-5xl">
                                {{ $set->cards[$currentIndex]->back_text }}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <div class="mt-10 flex items-center justify-between gap-4">
                <!-- Prev -->
                <button wire:click="prev" @disabled($currentIndex === 0) class="inline-flex items-center justify-center rounded-2xl border border-zinc-200 bg-white px-6 py-3 text-sm font-medium text-zinc-700 shadow-sm transition duration-200 hover:border-zinc-300 hover:bg-zinc-50 disabled:pointer-events-none disabled:opacity-40">
                    Назад
                </button>

                <!-- Progress -->
                <div class="flex flex-col items-center">
                    <span class="text-lg font-semibold text-zinc-900">
                        {{ $currentIndex + 1 }} / {{ $set->cards->count() }}
                    </span>

                    <div class="mt-3 h-2 w-40 overflow-hidden rounded-full bg-zinc-200">
                        <div class="h-full rounded-full bg-zinc-900 transition-all duration-300" style="width: {{ (($currentIndex + 1) / $set->cards->count()) * 100 }}%"
                        ></div>
                    </div>
                </div>

                <!-- Next -->
                <button wire:click="next" @disabled($currentIndex === $set->cards->count() - 1) class="inline-flex items-center justify-center rounded-2xl bg-zinc-900 px-6 py-3 text-sm font-medium text-white transition duration-200 hover:bg-zinc-700 disabled:pointer-events-none disabled:opacity-40">
                    Вперёд
                </button>
            </div>
        </div>
    @else
        <!-- Empty -->
        <div class="rounded-[2rem] border border-dashed border-zinc-300 bg-white py-24 text-center">
            <div class="mx-auto max-w-md">
                <h3 class="text-xl font-semibold text-zinc-900">
                    Карточек пока нет
                </h3>
                <p class="mt-3 text-sm leading-relaxed text-zinc-500">
                    Автор ещё не добавил карточки в этот набор.
                </p>
            </div>
        </div>
    @endif
</div>