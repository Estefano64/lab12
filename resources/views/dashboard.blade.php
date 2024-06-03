@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4">Dashboard</h1>
        <p>Bienvenido al dashboard.</p>
        <a href="{{ route('tareas.index') }}" class="inline-block mt-4 px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600">Gestionar Tareas</a>
        <!-- Aquí puedes agregar más enlaces o secciones del perfil -->
    
    </div>
</div>
@endsection