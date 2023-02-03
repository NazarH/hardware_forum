<x-base.base>
        <x-slot:title>
            HardwareForum - головна сторінка
        </x-slot>
        <x-header.header></x-header.header>
        <div class="container">
            <div class="pre-title viewf-title">
                <a href="/">Головна сторінка</a>
                <span><</span>
                <a href="{{route('home.viewforum', $forum_id)}}">{{$forum_name}}</a>
                <span><</span>
                <a href="{{$_SERVER['PATH_INFO']}}">Результати пошуку</a>
            </div>

            @if(empty($topics) && empty($messages))
                <div class="empty-search">Нажаль, нічого не знайдено</div>
            @endif

            @if(!empty($topics))
                <x-table.table :forum_id="$forum_id" :topics="$topics"></x-table.table>
            @endif

            @if(!empty($messages))
                <table class="topic-table topic topic-search">
                    <tr>
                        <th>Автор</th>
                        <th>Повідомлення</th>
                    </tr>
                    @foreach($messages as $message)
                        @php
                            $user_id = $message->user->id ?? '';
                            $user_name = $message->user->name ?? '';
                        @endphp
                        <tr>  
                            <td>
                                <div><a href="{{route('profile.index', $user_id)}}">{{$user_name}}</a> 
                                    <span class='evidence' title="Відповісти" onclick='userEvidence("{{$user_name}}")'>
                                        [e]
                                    </span>
                                    <span class='evidence' title="Цитувати" onclick='userQuote("{{$user_name}}", 
                                    "{{$message->created_at}}")'>
                                        [q]
                                    </span>
                                </div>
                                <div class="profile__avatar">
                                    @if(!empty($message->user->avatar->link))
                                        <img src="{{asset('/storage/'.$message->user->avatar->link)}}" alt="">
                                    @else
                                        <img src="{{asset("images/empty.jpeg")}}" alt="">  
                                    @endif 
                                </div>
                            </td>
                            <td class="prev-message">
                                <div>
                                    {{$message->created_at}} 
                                </div>
                                <pre>@php echo $message->message;@endphp</pre>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif

        </div>
</x-base.base>