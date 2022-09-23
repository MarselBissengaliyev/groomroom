@include('components.header')
@include('components.alert')
<!-- Form -->
@if (!Auth::check())
    <section class="form">
        <div class="form__inner container">
            <form method="post" action="{{ route('register') }}" class="form__item">
                @csrf
                <div class="form__content">
                    <h2>Регистрация</h2>
                    <input name="fio" type="text" placeholder="ФИО" value={{ old('fio') }}>
                    <input name="login" type="text" placeholder="Логин" value={{ old('login') }}>
                    <input name="email" type="email" placeholder="Email" value={{ old('email') }}>
                    <input name="password" type="password" placeholder="Пароль" value={{ old('password') }}>
                    <input name="password_confirmation" type="password" placeholder="Повтор пароля"
                        value={{ old('password_confirmation') }}>
                    <div>
                        <input type="hidden" name="confirmed" value="">
                        <input type="checkbox" name="confirmed" value="1">
                        <p>Согласен на обработку персональных данных</p>
                    </div>
                    <button type="submit" class="btn">Зарегестрироваться</button>
                </div>
            </form>

            <form method="post" action="{{ route('login') }}" class="form__item">
                @csrf
                <div class="form__content">
                    <h2>Вход</h2>
                    <input value="{{ old('login') }}" name="login" type="text" placeholder="Логин">
                    <input name="password" type="password" placeholder="Пароль">
                    <button class="btn">Войти</button>
                </div>
            </form>
        </div>
    </section>
@endauth
<!-- /.Form -->
<!-- Service -->
<section class="service">
    <div class="service__inner container">
        <h1>Выполненные услуги</h1>
        <div class="service__content">
            <div class="service__item">
                <p>Услуга оказана</p>
                <img src="{{ asset('assets/img/cat.jpg') }}" alt="">
                <h6>Барсик</h6>
            </div>
            <div class="service__item">
                <p>Услуга оказана</p>
                <img src="{{asset('assets/img/dog.jpg')}}" alt="">
                <h6>Шарик</h6>
            </div>
            <div class="service__item">
                <p>Услуга оказана</p>
                <img src="{{asset('assets/img/cat2.jpg')}}" alt="">
                <h6>Муська</h6>
            </div>
            <div class="service__item">
                <p>Услуга оказана</p>
                <img src="{{asset('assets/img/dog2.jpg')}}" alt="">
                <h6>Бруно</h6>
            </div>
        </div>
        <a class="service__btn btn" href="user.html">Подать заявку</a>
    </div>
</section>
<!-- /.Service -->

@include('components.footer')
