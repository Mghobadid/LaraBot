<?php


namespace App\Telegram\Commands;


use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Entities\Keyboard;
use Longman\TelegramBot\Entities\ServerResponse;

class StartCommand extends UserCommand
{

    /** @var string Command name */
    protected $name = 'start';
    /** @var string Command description */
    protected $description = 'Start';
    /** @var string Usage description */
    protected $usage = '/start';
    /** @var string Version */
    protected $version = '1.0.0';

    public function execute(): ServerResponse
    {

        $keyboard = new Keyboard(
            ['🆔اطلاعات شما', '📳 پشتیبانی','📶خدمات دلار'],
            ['4', '5', ],
            ['1', '2',],
            [' ', '0', ' ']
        );

        $keyboard->setResizeKeyboard(true)
            ->setOneTimeKeyboard(true)
            ->setSelective(false);
        return $this->replyToChat('🤚درود وقت بخیر به ربات ایران PayPal خوش امدید

👈شما میتوانید از این ربات دلار پی پال خریداری کنید فاکتور های هتزنر را انجام دهید
و یا دیتاسنتر مد نظر خود را خریداری کنید!

🫵توجه داشته باشید هر گونه سو استفاده از ربات پیگرد قانونی خواهد داشت

❌هرگونه خرید فروش فیلترشکن از ربات ما اکیدا ممنوعه در صورت مشاهده حساب پی پال مسدود میشود.

‼️لطفا قبل از کار کردن با ربات قوانین ما را مرور کنید که مشکلی براتون به وجود نیاد!👇
https://t.me/irPayPalan/36

💳پرداخت آنی ب صورت اتوماتیک

ایدی پشتیبانی : @IraniPayPal

کانال ما : @irPayPalan

ربات ما : @PayPalirbot

سایت ما : expaliran.org', [
            'reply_markup' => $keyboard,
        ]);
    }

}
