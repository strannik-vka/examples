<?php

namespace App\Console\Commands;

use App\Models\PaymentProduct;
use Illuminate\Console\Command;

class AutoChangePrice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:auto-change-price';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Автоматическое изменение цены';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $prices = [
            '2024-04-11' => 3900.00,
            '2024-04-13' => 4900.00,
        ];

        $currentDate = date('Y-m-d');

        if (isset($prices[$currentDate])) {
            $product = PaymentProduct::find(1);

            $product->amount = $prices[$currentDate];
            $product->save();
        }

        $this->info('ok');
    }
}
