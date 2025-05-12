<?php

use App\Models\Certification;
use App\Models\Education;
use App\Models\Employment;
use App\Models\Highlight;
use App\Models\Project;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('highlights', function (Blueprint $table) {
            $table->id();
            $table->text('description');
        });

        Schema::create('employment_highlight', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Highlight::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Employment::class)->constrained()->cascadeOnDelete();
        });
        Schema::create('education_highlight', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Highlight::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Education::class)->constrained()->cascadeOnDelete();
        });
        Schema::create('highlight_project', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Highlight::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Project::class)->constrained()->cascadeOnDelete();
        });
        Schema::create('certification_highlight', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Highlight::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Certification::class)->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certification_highlight');
        Schema::dropIfExists('highlight_project');
        Schema::dropIfExists('education_highlight');
        Schema::dropIfExists('employment_highlight');
        Schema::dropIfExists('highlights');
    }
};
