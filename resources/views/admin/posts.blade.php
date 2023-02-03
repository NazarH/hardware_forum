<x-admin.admin-nav>
        <table class="admin-table">
                <tr>
                    <th>Назва форуму</th>
                    <th>Назва посту</th>
                    <th>Користувач</th>
                    <th>Кількість повідомлень</th>
                    <th>
                        
                    </th>
                </tr>
                @foreach($topics as $topic)
                    <tr>
                        <td>{{$topic->theme_name->name}}</td>
                        <td>{{$topic->topic_name}}</td>
                        <td class="table-center">{{$topic->user_name}}</td>
                        <td class="table-center">{{$topic->answers}}</td>
                        <td>
                            <form class='table-delete' action="{{route('admin.posts.delete', $topic->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type=submit>
                                    Видалити
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
        </table>
        <div class="center-paginate">
            {{$topics->links()}}
        </div>
</x-admin.admin-nav>