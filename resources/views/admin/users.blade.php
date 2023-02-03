<x-admin.admin-nav>
        <table class="admin-table">
                <tr>
                    <th>Ім'я користувача</th>
                    <th>Конфігурація</th>
                    <th>Пошта</th>
                    <th>Роль</th>
                    <th>Дата реєстрації</th>
                    <th>
                        
                    </th>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>
                                <div onclick="showConf('{{$user->id}}')" class="table-script">
                                        <div class="btn-allo" id='show-{{$user->id}}'>
                                                Показати    
                                        </div>
                                        <div id='hide-{{$user->id}}' class="none btn-allo">
                                                Заховати
                                        </div>
                                </div>
                                <pre class="none pre-marg" id="conf-{{$user->id}}">@php echo $user->configuration;@endphp</pre>
                        </td>
                        <td class="table-center">{{$user->email}}</td>
                        <td class="table-center">{{$user->role}}</td>
                        <td class="table-center">{{$user->created_at}}</td>
                        <td>
                            <form class='table-delete' action="{{route('admin.users.delete', $user->id)}}" method="post">
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
            {{$users->links()}}
        </div>
</x-admin.admin-nav>