<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <!-- Header -->
    <div class="mb-10 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
        <div class="space-y-3">
            <div>
                <h1 class="text-4xl font-bold tracking-tight text-zinc-900">
                    Доступные наборы
                </h1>
            </div>
        </div>
    </div>

    <!-- Sets -->
    @if($sets->count())
        <div class="grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-3">
            @foreach($sets as $set)
                <a href="{{ route('student.cards', $set->id) }}" class="group relative overflow-hidden rounded-[2rem] border border-zinc-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-zinc-300 hover:shadow-xl">
                    <!-- Glow -->
                    <div class="absolute inset-0 bg-gradient-to-br from-zinc-100/40 via-transparent to-transparent opacity-0 transition duration-500 group-hover:opacity-100"></div>
                    <div class="relative flex h-full flex-col justify-between">
                        <!-- Top -->
                        <div>
                            <h3 class="text-2xl font-semibold tracking-tight text-zinc-900 transition duration-300 group-hover:text-black">
                                {{ $set->title }}
                            </h3>
                            @if($set->description)
                                <p class="mt-4 line-clamp-3 text-sm leading-relaxed text-zinc-500">
                                    {{ $set->description }}
                                </p>
                            @endif
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <!-- Empty -->
        <div class="rounded-[2rem] border border-dashed border-zinc-300 bg-white py-24 text-center">
            <div class="mx-auto max-w-md">
                <h3 class="text-xl font-semibold text-zinc-900">
                    Пока нет доступных наборов
                </h3>
                <p class="mt-3 text-sm leading-relaxed text-zinc-500">
                    Наборы появятся здесь, когда авторы добавят карточки.
                </p>
            </div>
        </div>
    @endif
</div>