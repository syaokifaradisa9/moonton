<?php

use App\Models\User;
use App\Models\SubscriptionPlan;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(SubscriptionPlan::class);
            $table->unsignedInteger('price');
            $table->dateTime('expired_date')->nullable();
            $table->string('payment_status', 10)->default('pending');
            $table->string('snapToken')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_subscriptions');
    }
};
