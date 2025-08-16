<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('proyectos')) {
            Schema::create('proyectos', function (Blueprint $table) {
                $table->id();
                $table->string('nombre');
                $table->date('fecha_inicio');
                $table->string('estado');
                $table->string('responsable');
                $table->decimal('monto', 10, 2);
                $table->foreignId('created_by')->constrained('usuarios');
                $table->timestamps();
            });
        } else {
            Schema::table('proyectos', function (Blueprint $table) {
                if (!Schema::hasColumn('proyectos', 'fecha_inicio')) $table->date('fecha_inicio')->nullable();
                if (!Schema::hasColumn('proyectos', 'estado')) $table->string('estado')->nullable();
                if (!Schema::hasColumn('proyectos', 'responsable')) $table->string('responsable')->nullable();
                if (!Schema::hasColumn('proyectos', 'monto')) $table->decimal('monto', 10, 2)->nullable();
                if (!Schema::hasColumn('proyectos', 'created_by')) $table->foreignId('created_by')->nullable()->constrained('usuarios');
            });
        }
    }

    public function down(): void
    {
        Schema::table('proyectos', function (Blueprint $table) {
            if (Schema::hasColumn('proyectos', 'created_by')) {
                $table->dropConstrainedForeignId('created_by');
            }
            foreach (['fecha_inicio','estado','responsable','monto'] as $col) {
                if (Schema::hasColumn('proyectos', $col)) $table->dropColumn($col);
            }
        });
    }
};
