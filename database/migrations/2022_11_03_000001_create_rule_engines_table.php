<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuleEnginesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::connection(config('decision-engine.db_connection'))->create('rule_engines', function (Blueprint $table) {
            if (config('decision-engine.db_primary_key_type') == 'uuid') {
                $table->uuid('id')->primary();
            } else {
                $table->id();
            }
            $table->string('created_by', 60)->nullable();
            $table->string('name', 150)->nullable()->unique();
            $table->string('type', 30)->nullable();
            $table->text('validation')->nullable();
            $table->text('business_rules')->nullable();
            $table->tinyInteger('status')->nullable();
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
        Schema::connection(config('decision-engine.db_connection'))->drop('rules_engines');
    }
}
