<?php


namespace App\Telegram\Commands;


use Longman\TelegramBot\Commands\SystemCommand;
use Longman\TelegramBot\Entities\ServerResponse;

class CallbackqueryCommand  extends SystemCommand
{


    /**
     * @var string
     */
    protected $name = 'callbackquery';

    /**
     * @var string
     */
    protected $description = 'Handle the callback query';

    /**
     * @var string
     */
    protected $version = '1.2.0';

    public function execute(): ServerResponse
    {
// Callback query data can be fetched and handled accordingly.
        $callback_query = $this->getCallbackQuery();
        $callback_data = $callback_query->getData();

        return $callback_query->answer([
            'text' => 'Content of the callback data: ' . $callback_data,
            'show_alert' => (bool)random_int(0, 1), // Randomly show (or not) as an alert.
            'cache_time' => 5,
        ]);
    }

}
