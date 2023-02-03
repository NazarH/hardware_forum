<x-admin.admin-nav>
    <x-admin.admin-table :forums="$forums"></x-admin.admin-table>
    <div class="center-paginate">
        {{$forums->links()}}
    </div>
</x-admin.admin-nav>