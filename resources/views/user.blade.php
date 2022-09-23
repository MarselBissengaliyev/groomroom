@include('components.header')
@include('components.alert')
<!-- /.Header -->
<section class="form">
    <div class="form__inner container">
        <form method="post" action="{{ route('create') }}" class="form__item" enctype="multipart/form-data">
            @csrf
            <div class="form__content">
                <h2>Создание заявки</h2>
                <input name="name" type="text" placeholder="Кличка домашнего животного">
                <label for="picture" class="form__upload">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                        </svg>

                        Фото домашнего животного
                    </span>
                    <input name="picture" accept="image/jpeg, image/bmp" type="file" id="picture">
                </label>
                <button class="btn">Создать</button>
            </div>
        </form>
    </div>
</section>

<section class="service">
    <div class="service__inner container">
        <h1>Мои заявки</h1>
        <div class="service__content">
            @foreach ($animals as $animal)
                <div class="service__item">
                    <a href="{{ route('delete', ['animalId' => $animal->id]) }}">
                        <span>
                            Удалить
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                    </a>
                    <p>
                        @if ($animal->status === 'new')
                            Новая
                        @endif
                        @if ($animal->status === 'processing')
                            Обработка данных
                        @endif
                        @if ($animal->status === 'finished')
                            Услуга оказанна
                        @endif
                    </p>
                    <img src="{{ Storage::url($animal->picture) }}" alt="">
                    <h6>{{ $animal->name }}</h6>
                </div>
            @endforeach
        </div>
    </div>
</section>

@include('components.footer')
