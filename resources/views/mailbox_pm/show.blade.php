<x-base.base>
        <x-slot:title>
            HardwareForum - головна сторінка
        </x-slot>
        <x-header.header></x-header.header>
        <div class="container">
            <div class="mailbox__top">
                <div class="pre-title mailbox-title">
                    <a href="{{route('profile.index', Auth::user()->id)}}">Профіль</a>
                    <span><</span>
                    <a href="{{route('mailbox.index')}}">Особисті повідомлення</a>
                    <span><</span>
                    <a href="{{$_SERVER['PATH_INFO']}}">Тема: {{$message->theme}}</a>
                </div>
                @if($message->sender->name !== Auth::user()->name)
                    <form action="{{route('mailbox.message', $message->sender->id)}}" method="get">
                        <input type="text" id="preTitleField" name='theme' value="{{$message->theme}}">
                        <div onclick="sendResponde()" class="btn">Відповісти</div>
                        <button type="submit" id="submitResp" target="_blank"></button>
                    </form>
                @else
                    <div></div>
                @endif
            </div>
            <table class="topic-table">
                <tr>
                    <th>Автор</th>
                    <th>Повідомлення</th>
                </tr>
                <tr>  
                    <td>
                        <div>
                            <a href="{{route('profile.index', $message->sender->id)}}">{{$message->sender->name}}</a>
                        </div>
                        <div class="profile__avatar">
                            @if(!empty($message->sender->avatar->link))
                                <img src="{{asset('/storage/'.$message->sender->avatar->link)}}" alt="">
                            @else
                                <img src="{{asset("images/empty.jpeg")}}" alt="">  
                            @endif 
                        </div>
                    </td>
                    <td class="prev-message">
                        <pre>@php echo $message->text;@endphp</pre>
                    </td>
                </tr>
            </table>
        </div>
</x-base.base>