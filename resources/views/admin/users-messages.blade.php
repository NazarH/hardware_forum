<x-admin.admin-nav>
        <table class="admin-table">
                <tr>
                    <th>Тема</th>
                    <th>Текст</th>
                    <th>Відправник</th>
                    <th>Отримувач</th>
                    <th>
                        
                    </th>
                </tr>
                @foreach($messages as $message)
                    <tr>
                        <td>{{$message->theme}}</td>
                        <td>
                                <div onclick="showText('{{$message->id}}')" class="table-script">
                                        <div class="btn-allo" id='show-{{$message->id}}'>
                                                Показати    
                                        </div>
                                        <div id='hide-{{$message->id}}' class="none btn-allo">
                                                Заховати
                                        </div>
                                </div>
                                <pre class="none pre-marg" id="mess-{{$message->id}}">@php echo $message->text;@endphp</pre>
                        </td>
                        <td class="table-center">{{$message->sender->name}}</td>
                        <td class="table-center">{{$message->receiver->name}}</td>
                        <td>
                            <form class='table-delete' action="{{route('admin.usersmess.delete', $message->id)}}" method="post">
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
            {{$messages->links()}}
        </div>
</x-admin.admin-nav>