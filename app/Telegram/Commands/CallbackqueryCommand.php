<?php


namespace App\Telegram\Commands;


use App\Telegram\Commands\Modules\Product;
use Longman\TelegramBot\Commands\SystemCommand;
use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Request;

class CallbackqueryCommand extends SystemCommand
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
        $callback_MSG_ID = $callback_query->getMessage()->getMessageId();
        $callback_CHAT_ID = $callback_query->getMessage()->getChat()->getId();
        if ($callback_data == 'exit')
        {
            Request::deleteMessage(['chat_id' => $callback_CHAT_ID,
                'message_id' => $callback_MSG_ID,]);
        }
        if (str_contains($callback_data, 'backbtn_'))
        {

            $parts = explode('_', $callback_data);
            $class_name = 'App\\Telegram\\Commands\\Modules\\' . $parts[1];
            $method_name = $parts[2];
            $instance = new $class_name;
            $data = $instance->$method_name();
            return Request::editMessageText([
                'chat_id' => $callback_CHAT_ID,
                'message_id' => $callback_MSG_ID,
                'text' => $data->text,
                'reply_markup' => $data->reply_markup
            ]);
        }
        if ($callback_data == 'show_product_list')
        {
            $callback_query->answer([
                'text' => 'لطفاً صبر کنید...',
                'show_alert' => false, // Randomly show (or not) as an alert.
                'cache_time' => 5,
            ]);
            sleep(5);
            $step2 = (new Product())->step2();
            return Request::editMessageText([
                'chat_id' => $callback_CHAT_ID,
                'message_id' => $callback_MSG_ID,
                'text' => $step2->text,
                'reply_markup' => $step2->reply_markup
            ]);


        }

        return $callback_query->answer([
            'text' => 'Content of the callback data: ' . $callback_data,
            'show_alert' => false, // Randomly show (or not) as an alert.
            'cache_time' => 5,
        ]);
    }

}
