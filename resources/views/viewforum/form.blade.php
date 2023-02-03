<x-base.base>
        <x-slot:title>
            HardwareForum - головна сторінка
        </x-slot>
        <x-header.header></x-header.header>
        <div class="container">
            <x-form.form :forum="$forum"></x-form.form>
        </div>
</x-base.base>