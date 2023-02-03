<table class="forum-table">
    <tr>
        <th>Тема</th>
        <th>Автор</th>
        <th>Відповіді</th>
        <th>Останнє повідомлення</th>
    </tr>
    @unless(!$topics)
        @foreach($topics as $topic)
            <tr>
                <td class="forum-table__link">
                    @php
                        $user_id = $topic->last_message->user->id ?? '';
                        $user_name = $topic->last_message->user->name ?? ''
                    @endphp
                    <a href="{{route('home.viewforum.topic', ['id' => $forumId, 'topic_id' => $topic->id])}}"><span class="topic-icon">📂</span>{{$topic->topic_name}}</a>
                <td>
                    <div class="table-center">{{$topic->user_name}}</div>
                </td>
                <td>
                    <div class="table-center">{{$topic->answers}}</div>
                </td>
                <td class="table-last">
                    <div><a href="/profile/id-{{$user_id}}">{{$user_name}}</a></div>
                    <div>{{$topic->last_message->created_at}}</div>
                </td>
            </tr>
        @endforeach
    @endunless
</table>