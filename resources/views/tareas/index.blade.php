@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
   <div class="bg-white shadow rounded-lg p-6">
       <h1 class="text-2xl font-bold mb-4">Tareas</h1>
      
       <!-- Formulario de Búsqueda -->
       <form action="{{ route('tareas.index') }}" method="GET" class="mb-6">
           <div class="mb-4">
               <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción:</label>
               <input type="text" name="descripcion" placeholder="Buscar por descripción" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400">
           </div>
           <div class="mb-4">
               <label for="categoria_id" class="block text-sm font-medium text-gray-700">Categoría:</label>
               <select name="categoria_id" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400">
                   <option value="">Todas</option>
                   @foreach($categorias as $categoria)
                       <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                   @endforeach
               </select>
           </div>
           <div class="mb-4">
               <label for="completada" class="block text-sm font-medium text-gray-700">Estado:</label>
               <select name="completada" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400">
                   <option value="">Todas</option>
                   <option value="1">Completadas</option>
                   <option value="0">No Completadas</option>
               </select>
           </div>
           <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Buscar</button>
       </form>

       <!-- Formulario de Nueva Tarea -->
       <h1 class="text-2xl font-bold mb-4">Agregar Tareas</h1>
       <form action="{{ route('tareas.store') }}" method="POST" class="flex flex-col space-y-4 mb-4">
           @csrf
           <input type="text" name="descripcion" placeholder="Nueva tarea" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400" required>
           <select name="categoria_id" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400">
               <option value="">Seleccionar Categoría</option>
               @foreach($categorias as $categoria)
                   <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
               @endforeach
           </select>
           <button type="submit" class="px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600">Agregar</button>
       </form>
      
       <ul class="list-disc pl-5 space-y-2">
           @foreach ($tareas as $tarea)
               <li class="flex justify-between items-center bg-gray-100 px-4 py-2 rounded-lg">
                   <span>{{ $tarea->descripcion }}</span>
                   <div>
                       <a href="{{ route('tareas.edit', $tarea) }}" class="mr-2 px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">Editar</a>
                       <form action="{{ route('tareas.toggle', $tarea) }}" method="POST" style="display:inline;">
                           @csrf
                           @method('PUT')
                           <button type="submit" class="mr-2 px-4 py-2 {{ $tarea->completada ? 'bg-green-500' : 'bg-gray-500' }} text-white rounded-lg hover:bg-green-600">
                               {{ $tarea->completada ? 'Completa' : 'Incompleta' }}
                           </button>
                       </form>
                       <form action="{{ route('tareas.destroy', $tarea) }}" method="POST" style="display:inline;">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">Eliminar</button>
                       </form>
                   </div>
               </li>
           @endforeach
       </ul>
       <div class="mt-4 flex justify-center bg-gray-800 text-white p-2 rounded-lg">
    {{ $tareas->links() }}
</div>



   </div>
</div>
@endsection

