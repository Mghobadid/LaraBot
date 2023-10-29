<?php


namespace PhpTelegramBot\Laravel\Console\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Longman\TelegramBot\Entities\Update;
use Longman\TelegramBot\Telegram;
use Symfony\Component\Console\Command\SignalableCommandInterface;

class TelegramFetchCommand extends Command
{

    protected $signature = 'telegram:fetch
                            {--a|all-update-types : Explicitly allow all updates (including "chat_member")}
                            {--allowed-updates= : Define allowed updates (comma-seperated)}';

    protected $description = 'Fetches Telegram updates periodically';

    protected bool $shallExit = false;

    protected ?int $childPid = null;

    public function handle(Telegram $bot)
    {
        $this->callSilent('telegram:delete-webhook');

        $options = [
            'timeout' => 30
        ];

        // allowed_updates
        if ($this->option('all-update-types'))
        {
            $options['allowed_updates'] = Update::getUpdateTypes();
        } elseif ($allowedUpdates = $this->option('allowed-updates'))
        {
            $options['allowed_updates'] = Str::of($allowedUpdates)->explode(',');
        }

        $this->info("Start fetching updates...\n<comment>(Exit with Ctrl + C)</comment>");

        while (true)
        {
            $response = rescue(fn() => $bot->handleGetUpdates($options));

            if ($response !== null && !$response->isOk())
            {
                dd($response);
                $this->error($response->getDescription());
            }

        }
    }

}
