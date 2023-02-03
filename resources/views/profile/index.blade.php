<x-base.base>
        <x-slot:title>
            HardwareForum - профіль користувача
        </x-slot>
        <x-header.header></x-header.header>
        <div class="container">
            <div class="pre-title">
                Профіль користувача {{$user[0]->name}}
            </div>
            <div class="profile">
                <div class="profile__top">
                    <div class="profile__avatar">
                        @if(!empty($user[0]->avatar->link))
                            <img src="{{asset('/storage/'.$user[0]->avatar->link)}}" alt="">
                        @else
                            <img src="{{asset("images/empty.jpeg")}}" alt="">  
                        @endif        
                    </div>
                    <div class="profile__info">
                        <div class="profile__item">
                            <div>
                                Ім'я користувача:
                            </div>
                            <div>
                                {{$user[0]->name}}
                            </div>
                        </div>
                        <div class="profile__item">
                            <div>
                                Зареєстрований:
                            </div>
                            <div>
                                {{$user[0]->created_at}}
                            </div>
                        </div>
                        <div class="profile__item">
                            <div>
                                Конфігурація ПК:
                            </div>
                            <div>
                                <pre id="userConf">{{$user[0]->configuration}}</pre>
                                <form action="{{route('profile.index.edit', $user[0]->id)}}" method="POST" class="profile-edit" id="profileEdit" enctype="multipart/form-data">
                                    @csrf
                                    <div class="profile-ava">
                                        <input type="file" name='image'>
                                    </div>
                                    <textarea name="configuration" id="" cols="30" rows="10">{{$user[0]->configuration}}</textarea>
                                    <button type='submit'>
                                        Зберегти
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @guest
                @else
                    @if(Auth::user()->id === $user[0]->id)
                        <div class="profile__bottom" id="editBtn" onclick="editProfile()">
                            Редагувати профіль
                        </div>
                    @endif
                @endguest
            </div>
            <div class="contacts">
                <div class="contacts__top">
                    Контактна інформація користувача {{$user[0]->name}}
                </div>
                <div class="contacts__bottom">
                    @if($user[0]->id !== Auth::user()->id)
                        <div>
                            Приватне повідомлення:
                        </div>
                        <a href="{{route('mailbox.message', $user[0]->id)}}">Відправити приватне повідомлення</a>
                    @else
                        <div>
                            Особисті повідомлення:
                        </div>
                        <a href="{{route('mailbox.index')}}">Переглянути</a>
                    @endif
                </div>
            </div>
        </div>
</x-base.base>