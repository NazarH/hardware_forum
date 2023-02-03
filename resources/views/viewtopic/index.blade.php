<x-base.base>
        <x-slot:title>
            HardwareForum - головна сторінка
        </x-slot>
        <x-header.header></x-header.header>
        @php
            $theme_name = $topic->theme_name->name ?? '';
            $theme_id = $topic->theme_name->id ?? '';
        @endphp
        <div class="container">
            <div class="table-top">
                <div class="pre-title">
                    <a href="/">Головна сторінка</a>
                    <span><</span>
                    <a href="{{route('home.viewforum', $theme_id)}}">{{$theme_name}}</a>
                    <span><</span>
                    <a href="{{$_SERVER['PATH_INFO']}}">{{$topic->topic_name}}</a>
                </div>
                <div class="top-paginate">
                    {{$messages->links()}}
                </div>
            </div>
            <table class="topic-table">
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
                @guest
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                @else
                    <tr>
                        <td></td>
                        <td>
                            <div class="form__topic margin">
                                <div>
                                    Швидка відовідь
                                </div>
                                <form action="{{route('preview.index')}}" method="get" class='topic-prev'>
                                    <textarea name="pre_text" id="preTextArea" cols="30" rows="10"></textarea>
                                    <div onclick="sendDataTopic()" class="preSendBtn">Попередній перегляд</div>
                                    <button type="submit" id="submit" target="_blank"></button>
                                </form>
                            </div>
                            <form class="form topic-form" action="{{route('home.viewforum.topic.message', ['id' => $id, 'topic_id' => $topic_id])}}" method="POST">
                                @csrf
                                <div class="form__atrb">
                                    <div></div>
                                    <div></div>
                                    <div>
                                        <span class="form__text-btn" title="Жирний текст: <b>текст</b>" onclick='textWeight()'>
                                            B
                                        </span>

                                        <span class="form__text-btn tilted" title="Нахилений текст: <i>текст</i>" onclick='textTilted()'>
                                            I
                                        </span>

                                        <span class="form__text-btn emphatic" title="Підкреслений текст: <u>текст</u>" onclick='textEmphatic()'>
                                            U
                                        </span>

                                        <span class="form__text-btn" title="Цитата: <blockquote>текст</blockquote>" onclick='textQuote()'>
                                            Q
                                        </span>

                                        <span class="form__text-btn" title="Перекреслений: <s>текст</s>" onclick='textCrossedOut()'>
                                            S
                                        </span>

                                        <span class="form__text-btn list-left" title="Звичаний cписок: <ul></ul>" onclick='textList()'>
                                            L
                                        </span>

                                        <span class="form__text-btn list" title="Нумерований cписок: <ol></ol>" onclick='textNumberList()'>
                                            LN
                                        </span>

                                        <span class="form__text-btn list" 
                                        title="Елемент списку: <ul><li>елемент</li><li>елемент</li></ul>
                                        <ol><li>елемент</li><li>елемент</li></ol>" onclick='textListElement()'>
                                            Le
                                        </span>
                                    </div>
                                    <div>
                                        <textarea name="text" id="textArea" cols="30" rows="10" ></textarea>
                                    </div>
                                    <div class="form__emot">
                                        <div onclick="textEmote1()">
                                            🙂
                                        </div>
                                        <div onclick="textEmote2()">
                                            🙁
                                        </div>
                                        <div onclick="textEmote3()">
                                            😟
                                        </div>
                                        <div onclick="textEmote4()">
                                            😉
                                        </div>
                                        <div onclick="textEmote5()">
                                            😕
                                        </div>
                                        <div onclick="textEmote6()">
                                            😐
                                        </div>
                                        <div onclick="textEmote7()">
                                            😁
                                        </div>
                                        <div onclick="textEmote8()">
                                            😎
                                        </div>
                                        <div onclick="textEmote9()">
                                            😛
                                        </div>
                                        <div onclick="textEmote10()">
                                            😲
                                        </div>
                                        <div onclick="textEmote11()">
                                            🙄
                                        </div>
                                        <div onclick="textEmote12()">
                                            😭
                                        </div>
                                        <div onclick="textEmote13()">
                                            🤔
                                        </div>
                                        <div onclick="textEmote14()">
                                            🤨
                                        </div>
                                        <div onclick="textEmote15()">
                                            😆
                                        </div>
                                        <div onclick="textEmote16()">
                                            🤬
                                        </div>
                                        <div onclick="textEmote17()">
                                            🤢
                                        </div>
                                        <div onclick="textEmote18()">
                                            🤡
                                        </div>
                                        <div onclick="textEmote19()">
                                            👍
                                        </div>
                                        <div onclick="textEmote20()">
                                            👎
                                        </div>
                                        <div onclick="textEmote21()">
                                            🍻
                                        </div>
                                    </div>
                                </div>
                                <div class=form__btns>
                                    <button type='submit'>
                                        Відправити
                                    </button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endguest
            </table>
            <div class="bottom-paginate">
                {{$messages->links()}}
            </div>
        </div>
</x-base.base>