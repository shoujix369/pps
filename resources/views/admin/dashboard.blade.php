<x-app-layout>
    <h1>Dashboard {{ ucfirst(auth()->user()->role) }}</h1>
    <p>Total: {{ $stats['total'] }}</p>
    <p>Menunggu: {{ $stats['menunggu'] }}</p>
    <p>Selesai: {{ $stats['selesai'] }}</p>
</x-app-layout>
