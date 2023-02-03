<x-base.base>
        <x-slot:title>
            HardwareForum - головна сторінка
        </x-slot>
        <x-header.header></x-header.header>
        <div class="container">
            <div class="categories">
                <table>
                    <tr>
                        <th>Тематика</th>
                        <th>Постів</th>
                        <th>Повідомлень</th>
                        <th>Останнє повідомлення</th>
                    </tr>
                    @if(!empty($forums))
                        @foreach($forums as $forum)
                            @php
                                $topic_id = $forum->last_message->topic->id ?? '';
                                $topic_name = $forum->last_message->topic->topic_name ?? '';
                                $topic_date = $forum->last_message->created_at ?? '';
                                $user_id = $forum->last_message->user->id ?? '';
                                $user_name = $forum->last_message->user->name ?? '';
                            @endphp
                            <tr>
                                <td>
                                    <a href="{{route('home.viewforum', $forum->id)}}">{{$forum->name}}</a>
                                    <div>{{$forum->short_desc}}</div>
                                </td>
                                <td>
                                    <div class="table-center">{{$forum->posts}}</div>
                                </td>
                                <td>
                                    <div class="table-center">{{$forum->messages}}</div>
                                </td>
                                <td class="main-table-last-td">
                                    <div class="table-topic-name">
                                        <a href="/viewforum/forum-{{$forum->id}}/topic-{{$topic_id}}">{{$topic_name}}<a>
                                    </div>
                                    <div class="table-last-td">
                                        <div><a href="/profile/id-{{$user_id}}">{{$user_name}}</a></div>
                                        <div>{{$topic_date}}</div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>
        </div>
        <x-footer.footer :last_user="$last_user" :user_count="$user_count" :posts_count="$posts_count" :posts_messages="$posts_messages"></x-footer.footer>
</x-base.base>