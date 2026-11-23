<x-app-layout>
    <h1>Dashboard Admin</h1>
    <p>Total: {{ $stats['total'] }}</p>
    <p>Menunggu: {{ $stats['menunggu'] }}</p>
    <p>Selesai: {{ $stats['selesai'] }}</p>

    <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
</x-app-layout>
