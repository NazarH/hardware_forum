<div class="container">
    <div class="table-attributes">
        <div></div>
        <form action="{{route('admin.user.index')}}" method="post">
            @csrf
            <input type="text" name="id" placeholder="Введіть id користувача...">
            <button type="submit">Пошук</button>
        </form>
    </div>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Ім'я</th>
            <th>Пошта</th>
            <th>Статус</th>
            <th></th>
        </tr>
        @unless(empty($users))
            @foreach($users as $user)
                <tr>
                    <td class="item-center">{{$user->id}}</td>
                    <td>{{$user->name.' '.$user->surname}}</td>
                    <td class="item-center">{{$user->email}}</td>
                    <td class="item-center">
                        @if($user->id === Auth::user()->id)
                            ADMIN
                        @else
                            <form action="{{route('admin.user.role', $user->id)}}" method="post">
                                @csrf
                                <select name="userRole" onchange="roleChange()">
                                    <option value="admin" {{$user->role === 'admin' ? 'selected' : ''}}>admin</option>
                                    <option value="user" {{$user->role === 'user' ? 'selected' : ''}}>user</option>
                                </select>
                                <button type="submit" class="role-btn" id="changeRole"></button>
                            </form>
                        @endif
                    </td>
                    <td class="table-buttons">
                        @if(!($user->id === Auth::user()->id))
                            <form action="{{route('admin.user.delete', $user->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Видалити">
                            </form>
                        @else
                            <form action="" method="post">
                                <input type="button" value="" disabled>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        @endunless
    </table>
</div>
