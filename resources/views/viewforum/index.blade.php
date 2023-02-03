<x-base.base>
        <x-slot:title>
            HardwareForum - головна сторінка
        </x-slot>
        <x-header.header></x-header.header>
        <div class="container">
            <div class="pre-title viewf-title">
                <a href="/">Головна сторінка</a>
                <span><</span>
                <a href="{{$_SERVER['PATH_INFO']}}">{{$forum_name}}</a>
            </div>
            <div class="table-top">
                <div>
                    <div class="table-top__topic">
                        <a href="{{route('viewforum.posting', $forum_id)}}">Нова тема</a>
                    </div>
                    <form action="{{route('home.viewforum.search', $forum_id)}}" method="get">
                        <input type="text" name='search' placeholder="Шукати на цьому форумі">
                        <button type="submit">Пошук</button>
                    </form>
                </div>
                <div>
                    {{$topics->links()}}
                </div>
            </div>
            <x-table.table :forum_id="$forum_id" :topics="$topics"></x-table.table>
            <div class="bottom-paginate">
                {{$topics->links()}}
            </div>
        </div>
</x-base.base>