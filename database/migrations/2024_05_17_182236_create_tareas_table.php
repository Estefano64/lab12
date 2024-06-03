<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTareasTable extends Migration {
   public function up() {
       Schema::create('tareas', function (Blueprint $table) {
           $table->id();
           $table->string('descripcion');
           $table->foreignId('categoria_id')->nullable()->constrained()->onDelete('cascade');
           $table->foreignId('user_id')->constrained()->onDelete('cascade');
           $table->boolean('completada')->default(false);
           $table->timestamps();
       });
   }

   public function down() {
       Schema::dropIfExists('tareas');
   }
}
