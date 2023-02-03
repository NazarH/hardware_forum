<x-base.base>
        <x-slot:title>
            HardwareForum - авторизація
        </x-slot>
        <x-header.header></x-header.header>
        <div class="container">
            <form class="login-form" method="POST" action="{{ route('login') }}" id="loginForm">
                @csrf
                <div class="login-top">
                    Авторизація
                </div>
                <div class="login-block">
                    <div class="login-title">Електронна пошта:</div>
                    <input type="email" name="email" value="{{old('email')}}">
                    @error('email')
                        <p class="red">{{$message}}</p>
                    @enderror
                </div>
                <div class="login-block">
                    <div class="login-title">Пароль:</div>
                    <input type="password" name="password">
                    @error('password')
                        <p class="red">{{$message}}</p>
                    @enderror
                </div>
                <div class="login-btn">
                    <button type="submit">Увійти</button>
                </div>
            </form>   
            <div class="register-block">
                <div class="register-top">
                    Реєстрація
                </div>
                <div class="register-rules">
                    <div>
                        Для входу на форум ви повинні бути зареєстровані. Реєстрація займає декілька секунд але надає вам більш широкі можливості. Адміністратор може надати додаткові привілеї зареєстрованим користувачам. Перед тим, як увійти, будь ласка, переконайтесь що ви погоджуєтесь з правилами та політиками, які прийняті на форумі. Пам'ятайте, що ваше перебування на форумі означає вашу згоду з усіма правилами.
                    </div>
                    <div>
                        <a href="">Умови використання</a> | <a href="">Заява про конфіденційність</a>
                    </div>
                </div>
                <div class="register-btn">
                    <a href="register">Реєстрація</a>
                </div>
            </div>             
        </div>
</x-base.base>
