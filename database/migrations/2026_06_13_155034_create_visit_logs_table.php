<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('visit_logs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('visit_id')
                ->constrained()
                ->onDelete('cascade');

            $table->enum('type', ['entry', 'exit']);

            $table->timestamp('scanned_at')->useCurrent();

            $table->string('scanned_by')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visit_logs');
    }
};
