<?php

/**
 * This file is part of the PHP Telegram Bot example-bot package.
 * https://github.com/php-telegram-bot/example-bot/
 *
 * (c) PHP Telegram Bot Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Generic message command
 *
 * Gets executed when any type of message is sent.
 *
 * In this message-related context, we can handle any kind of message.
 */

namespace App\Telegram\Commands;

use App\Telegram\Commands\Modules\Product;
use Longman\TelegramBot\Commands\SystemCommand;
use Longman\TelegramBot\Entities\ServerResponse;
use PhpTelegramBot\FluentKeyboard\ReplyKeyboard\KeyboardButton;
use PhpTelegramBot\FluentKeyboard\ReplyKeyboard\ReplyKeyboardMarkup;

class GenericmessageCommand extends SystemCommand
{
    /**
     * @var string
     */
    protected $name = 'genericmessage';

    /**
     * @var string
     */
    protected $description = 'Handle generic message';

    /**
     * @var string
     */
    protected $version = '1.0.0';

    /**
     * Main command execution
     *
     * @return ServerResponse
     */
    public function execute(): ServerResponse
    {
        $message = $this->getMessage();

        $user_id = $message->getFrom()->getId();
        $command = $message->getCommand();
        /**
         * Handle any kind of message here
         */


        $message_text = $message->getText(true);
        if ($message_text == '🆔اطلاعات شما')
        {
            return $this->replyToChat("📶 اطلاعات حساب شما

🆔 ایدی عددی شما : $user_id

◀️تعداد دلار خریداری شده :
0.0 دلار");
        }
        if ($message_text == 'پشتیبانی')
        {
            return $this->replyToChat("👩‍💼 پیام خود را برای پشتیبانی ارسال فرمایید

❌برای پاسخ به جواب ما باید روی پشتیبانی کلیک کنید!

📞زمان پاسخگویی بین 0 تا 24 ساعت میباشد

✅ ساعت پاسخگویی 10 صبح تا 11 شب");
        }
        if ($message_text == 'آموزش')
        {
            return $this->replyToChat("👩‍💼 پیام خود را برای پشتیبانی ارسال فرمایید

❌برای پاسخ به جواب ما باید روی پشتیبانی کلیک کنید!

📞زمان پاسخگویی بین 0 تا 24 ساعت میباشد

✅ ساعت پاسخگویی 10 صبح تا 11 شب");
        }
        if ($message_text == 'کیف پول')
        {
            return $this->replyToChat("👩‍💼 پیام خود را برای پشتیبانی ارسال فرمایید

❌برای پاسخ به جواب ما باید روی پشتیبانی کلیک کنید!

📞زمان پاسخگویی بین 0 تا 24 ساعت میباشد

✅ ساعت پاسخگویی 10 صبح تا 11 شب");
        }
        if ($message_text == 'تراکنش ها')
        {
            return $this->replyToChat("👩‍💼 پیام خود را برای پشتیبانی ارسال فرمایید

❌برای پاسخ به جواب ما باید روی پشتیبانی کلیک کنید!

📞زمان پاسخگویی بین 0 تا 24 ساعت میباشد

✅ ساعت پاسخگویی 10 صبح تا 11 شب");
        }
        if ($message_text == 'محصولات')
        {
            $step1=(new Product())->step1();
            return $this->replyToChat($step1->text, ['reply_markup' =>$step1->reply_markup]);
        }
        if ($message_text == 'سفارشات')
        {
            return $this->replyToChat('👮‍♀به خدمات دلار خوش امدید

🙏لطفا انتخاب کنید پرداخت پی پال یا پاییر', [
                'reply_markup' => ReplyKeyboardMarkup::make()
                    ->oneTimeKeyboard()
                    ->button(KeyboardButton::make('Cancel'))
                    ->button(KeyboardButton::make('OK')),
            ]);
        }

//        return Request::emptyResponse();
    }
}
