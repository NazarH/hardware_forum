    <form action="{{route('admin.forums.create')}}" method="POST" class="admin-form">
        @csrf
        <div>
            <input type="text" name="name" placeholder="Назва форуму">
        </div>
        <div>
            <input type="text" name="short_desc" placeholder="Короткий опис">
        </div>
        <button type="submit">
            Створити
        </button>
    </form>
    <table class="admin-table">
        <tr>
            <th>Назва форуму</th>
            <th>Короткий опис</th>
            <th>Кількість постів</th>
            <th>Кількість повідомлень</th>
            <th>
                
            </th>
        </tr>
        @foreach($forums as $forum)
            <tr>
                <td>{{$forum->name}}</td>
                <td class="table-desc">{{$forum->short_desc}}</td>
                <td class="table-center">{{$forum->posts}}</td>
                <td class="table-center">{{$forum->messages}}</td>
                <td>
                    <form class='table-delete' action="{{route('admin.forums.delete', $forum->id)}}" method="post">
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
