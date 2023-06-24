<?php

use App\Models\Product;
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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name');
            $table->string('product_description');
            $table->string('product_image')->nullable();
            $table->bigInteger('quantity')->nullable();
            $table->float('price');
            $table->boolean('status')->default(true)->comment('false = disabled, true = enabled');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }

    private function updateStatus()
    {
        $products = Product::all();

        foreach ($products as $product) {
            if ($product->quantity === 0) {
                $product->status = false;
                $product->save();
            }
        }
    }
};