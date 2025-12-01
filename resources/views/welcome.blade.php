@use('App\Models\Author')

<x-layout.app>
    @php
        $users = Author::all();
    @endphp

    <div class="flex h-screen flex-col items-center justify-center">
        @foreach ($users as $user)
            <p>{{ $user->name }}</p>
            <p>{{ $user->email }}</p>
        @endforeach
    </div>
</x-layout.app>
