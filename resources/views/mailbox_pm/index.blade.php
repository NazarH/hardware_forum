<x-base.base>
        <x-slot:title>
            HardwareForum - пошта
        </x-slot>
        <x-header.header></x-header.header>
        <div class="container">
            <div class="mailbox__top">
                <div class="pre-title mailbox-title">
                    <a href="{{route('profile.index', Auth::user()->id)}}">Профіль</a>
                    <span><</span>
                    <a href="{{$_SERVER['PATH_INFO']}}">Особисті повідомлення</a>
                </div>
                <div>
                    <form action="{{route('mailbox.index.delete')}}" class="mailbox-delete" method="post">
                        @csrf
                        @method('delete')
                        <input type="text" id='idsArr' name='ids' class="display-none">
                        <button type='submit'>Видалити</button>
                    </form>
                </div>
            </div>
            <div class="mailbox__bottom">
                <div>
                    <div onclick="mailRecShow()" id="menuRec">
                        Отримані
                    </div>
                    <div onclick="mailSendShow()" id="menuSend">
                        Відправлені
                    </div>
                </div>
                <div>
                    <table class="mailbox__table" id='mailboxRec'>
                        <tr>
                            <th>Повідомлення</th>
                            <th>Автор</th>
                            <th>Відправлено</th>
                            <th>Відмітити</th>
                        </tr>
                        @foreach($receiver as $message)
                            <tr class="mailbox__item">
                                <td>
                                    <span>📂</span>
                                    <a href="{{route('mailbox.message.show', $message->id)}}">RE: {{$message->theme}}</a></td>
                                <td>{{$message->sender->name}}</td>
                                <td>{{$message->created_at}}</td>
                                <td><input type="checkbox" onclick="collectId('{{$message->id}}')"></td>
                            </tr>
                        @endforeach
                    </table>
                    <table class="mailbox__table" id='mailboxSend'>
                        <tr>
                            <th>Повідомлення</th>
                            <th>Відправлено</th>
                            <th>Відмітити</th>
                        </tr>
                        @foreach($sender as $message)
                            <tr class="mailbox__item">
                                <td><span>📂</span><a href="{{route('mailbox.message.show', $message->id)}}">RE: {{$message->theme}}</a></td>
                                <td>{{$message->created_at}}</td>
                                <td><input type="checkbox" onclick="collectId('{{$message->id}}')"></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
</x-base.base>