<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuleExecutionLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::connection(config('decision-engine.db_connection'))->create('rule_execution_logs', function (Blueprint $table) {
            if (config('decision-engine.db_primary_key_type') == 'uuid') {
                $table->uuid('id')->primary();
                $table->uuid('rule_execution_id')->nullable();
            } else {
                $table->id();
                $table->unsignedBigInteger('rule_execution_id')->nullable();
            }
            $table->text('previous_attributes')->nullable();
            $table->text('new_attributes')->nullable();
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
