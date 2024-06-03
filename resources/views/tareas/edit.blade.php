@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
   <div class="bg-white shadow rounded-lg p-6">
       <h1 class="text-2xl font-bold mb-4">Editar Tarea</h1>
       <form action="{{ route('tareas.update', $tarea) }}" method="POST">
           @csrf
           @method('PUT')
           <div class="mb-4">
               <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción:</label>
               <input type="text" name="descripcion" value="{{ $tarea->descripcion }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400" required>
           </div>
           <div class="mb-4">
               <label for="categoria_id" class="block text-sm font-medium text-gray-700">Categoría:</label>
               <select name="categoria_id" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400">
                   <option value="">Seleccionar Categoría</option>
                   @foreach($categorias as $categoria)
                       <option value="{{ $categoria->id }}" {{ $tarea->categoria_id == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                   @endforeach
               </select>
           </div>
           <button type="submit" class="px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600">Actualizar</button>
       </form>
   </div>
</div>
@endsection

