<?php

use App\Domain\Models\Payment\Enum\PaymentStatusEnum;
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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignId('user_id');
            $table->foreignId('ticket_id');
            $table->string('status')->default(PaymentStatusEnum::created);
            $table->string('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
