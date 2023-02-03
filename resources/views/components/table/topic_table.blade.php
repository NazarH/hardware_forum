<table class="topic-table">
    <tr>
        <th>Автор</th>
        <th>Повідомлення</th>
    </tr>
    <tr>  
        <td>
            <div>{{Auth::user()->name}}</div>
            <div class="profile__avatar">
                @if(!empty(Auth::user()->avatar->link))
                    <img src="{{asset('/storage/'.Auth::user()->avatar->link)}}" alt="">
                @else
                    <img src="{{asset("images/empty.jpeg")}}" alt="">  
                @endif 
            </div>

        </td>
        <td class="prev-message">
            <pre>@php $text = $_GET['pre_text'];echo trim($text);@endphp</pre>
        </td>
    </tr>
</table>