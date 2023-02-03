<x-base.base>
        <x-slot:title>
            HardwareForum - головна сторінка
        </x-slot>
        <x-header.header></x-header.header>
        <div class="container">
                <div class="pre-title">
                    @if(array_key_exists('pre_title', $_GET))
                        <a href="">{{$_GET['pre_title']}}</a>
                    @elseif(array_key_exists('theme', $_GET))
                        <a href="">{{$_GET['theme']}}</a>
                    @endif
                </div>
            <x-table.topic_table></x-table.topic_table>
        </div>
</x-base.base>

