<x-admin.admin-nav>
        <table class="admin-table">
                <tr>
                    
                    <th>Користувач</th>
                    <th>Повідомлення</th>
                    <th>ID форуму</th>
                    <th>ID посту</th>
                    <th>
                        
                    </th>
                </tr>
                @foreach($messages as $message)
                    <tr>
                        <td>{{$message->user->name}}</td>
                        <td>
                                <div onclick="showMessage('{{$message->id}}')" class="table-script">
                                        <div class="btn-allo" id='show-{{$message->id}}'>
                                                Показати    
                                        </div>
                                        <div id='hide-{{$message->id}}' class="none btn-allo">
                                                Заховати
                                        </div>
                                </div>
                                <pre class="none pre-marg" id="message-{{$message->id}}">@php echo $message->message;@endphp</pre>
                        </td>
                        <td class="table-center">{{$message->theme_id}}</td>
                        <td class="table-center">{{$message->topic_id}}</td>
                        <td>
                            <form class='table-delete' action="{{route('admin.messages.delete', $message->id)}}" method="post">
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