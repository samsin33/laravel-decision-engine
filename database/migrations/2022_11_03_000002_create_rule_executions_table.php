<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuleExecutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::connection(config('decision-engine.db_connection'))->create('rule_executions', function (Blueprint $table) {
            if (config('decision-engine.db_primary_key_type') == 'uuid') {
                $table->uuid('id')->primary();
                $table->uuid('rule_engine_id')->nullable();
            } else {
                $table->id();
                $table->unsignedBigInteger('rule_engine_id')->nullable();
            }
            $table->string('created_by', 60)->nullable();
            $table->text('input')->nullable()->index();
            $table->text('output')->nullable();
            $table->string('status', 30)->nullable();
            $table->ipAddress('ipaddress')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::connection(config('decision-engine.db_connection'))->drop('rule_executions');
    }
}
