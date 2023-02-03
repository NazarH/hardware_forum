<x-base.base>
        <x-slot:title>
            HardwareForum - реєстрація
        </x-slot>
        <x-header.header></x-header.header>
        <div class="container">
            <form action="{{ route('register') }}" method="POST" id="registerForm">
                @csrf
                <div class="login-form reg">
                    <div class="login-top">
                        <div>Реєстрація</div>
                    </div>
                    <div class="login-bottom">
                        <div class='form-block'>
                             <div>Ім'я користувача</div>
                            <input type="text" name="name" value="{{old('name')}}"> 
                        </div>
                        <div class='form-block'>
                            <div>Пароль</div>
                            <input type="password" name="password">
                        </div>
                        <div class='form-block first-block'>
                            <div>Електронна пошта</div>
                            <input type="text" name="email" value="{{old('email')}}">
                        </div>
                        <div class='form-block'>
                            <div>Мова:</div>
                            <select name="language" id="">
                                <option value="ukrainian">Українська</option>
                                <option value="english">English</option>
                            </select>
                        </div>
                        <div class='form-block second-block'>
                            <div>Конфігурація ПК:</div>
                            <textarea name="configuration" id="" cols="30" rows="10" 
                            value="{{old('configuration')}}"></textarea>
                        </div>
                    </div>
                </div>
                <div class="last-block">
                    <button type=submit>Зареєструватися</button>
                </div>
            </form>
        </div>
</x-base.base>