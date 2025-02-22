<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Subscription;
use Carbon\Carbon;

class DeactivateExpiredSubscriptions extends Command
{
    protected $signature = 'subscriptions:deactivate';
    protected $description = 'Отключает просроченные подписки';

    public function handle()
    {
        Subscription::where('status', 'active')
            ->whereDate('expires_at', '<=', Carbon::now())
            ->update(['status' => 'inactive']);

        $this->info('Просроченные подписки отключены.');
    }
}
