@include('components.header')
@include('components.alert')

<section class="service">
    <div class="service__inner container">
        <h1>Все заявки</h1>
        <div class="service__content">
            @foreach ($animals as $animal)
                <form enctype="multipart/form-data" method="post" action="{{ route('update-status', ['animalId' => $animal->id]) }}" class="service__item">
                    @csrf
                    <select name="status-{{ $animal->id }}" id="status-{{ $animal->id }}">
                        <option {{ 'new' == $animal->status ? "selected" : "" }} value="new">Новая</option>
                        <option {{ 'processing' == $animal->status ? "selected" : "" }} value="processing">Обработка данных</option>
                        <option {{ 'finished' == $animal->status ? "selected" : "" }} value="finished">Услуга оказана</option>
                    </select>
                    <img src="{{ Storage::url($animal->picture) }}" alt="">
                    <h6>{{ $animal->name }}</h6>
                    <label for="picture-{{ $animal->id }}" class="form__upload">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                              </svg>
                              
                            Прикрепить результат
                        </span>
                        <input name="picture-{{ $animal->id }}" accept="image/jpeg, image/bmp" type="file"  id="picture-{{ $animal->id }}">
                    </label>
                    <button type="submit" {{ 'finished' == $animal->status ? 'disabled' : '' }}>
                        {{ 'finished' == $animal->status ? 'Услуга оказанна' : 'Сохранить' }}
                    </button>
                </form>
            @endforeach
        </div>
    </div>
</section>

@include('components.footer')