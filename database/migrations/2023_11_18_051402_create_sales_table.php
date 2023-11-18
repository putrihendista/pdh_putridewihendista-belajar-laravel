<?php

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
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 20)->unique(); // Kolom code sebagai unique key
            $table->date('trx_date');
            $table->decimal('sub_amount', 15, 2)->nullable();
            $table->decimal('amount_total', 15, 2)->nullable();
            $table->decimal('discount_amount', 15, 0)->nullable();
            $table->timestamps();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedInteger('total_products')->nullable();
            $table->unsignedInteger('customer_id');
            $table->text('description')->nullable();

            // Foreign key constraints
            // $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
