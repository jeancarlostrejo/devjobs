<?php

use App\Enums\Status;
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
        Schema::table('vacants', function (Blueprint $table) {
            $table->string('title')->after('id');
            $table->foreignId('category_id')->after('title')->constrained()->cascadeOnDelete();
            $table->foreignId('salary_id')->after('category_id')->constrained()->cascadeOnDelete();
            $table->string('company')->after('salary_id');
            $table->date('last_day_apply')->after('company');
            $table->text('description')->after('last_day_apply');
            $table->string('image')->after('description');
            $table->integer('status')->after('image')->default(Status::PUBLISHED->value);
            $table->foreignId('user_id')->after('salary_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vacants', function (Blueprint $table) {
            $table->dropConstrainedForeignId('category_id');
            $table->dropConstrainedForeignId('salary_id');
            $table->dropConstrainedForeignId('user_id');
            $table->dropColumn(['title', 'company', 'last_day_apply', 'description', 'image', 'status']);
        });
    }
};
