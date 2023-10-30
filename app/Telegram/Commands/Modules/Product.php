<?php

namespace App\Telegram\Commands\Modules;

use Longman\TelegramBot\Entities\InlineKeyboard;
use Longman\TelegramBot\Entities\InlineKeyboardButton;

class Product
{

    public function step1()
    {
        $text = "دسته بندی محصول";
        $products_buttons = new InlineKeyboard(
            [
                new InlineKeyboardButton(
                    [
                        'text' => 'سرور Vpn',
                        'callback_data' => 'show_product_list',
                    ]
                ),

            ],
            [
                new InlineKeyboardButton(
                    [
                        'text' => 'بازگشت',
                        'callback_data' => 'exit',
                    ]
                ),

            ]);
        return (object)["text"=>$text,'reply_markup'=>$products_buttons];
    }
    public function step2()
    {
        $text = "لیست محصولات ";
        $products_buttons = new InlineKeyboard(
                [
                    new InlineKeyboardButton(
                        [
                            'text' => 'محصول 1 2000 هزار تومان',
                            'callback_data' => 'product_1',
                        ]
                    ),

                ],
                [
                    new InlineKeyboardButton(
                        [
                            'text' => 'محصول 2 2000 هزار تومان',
                            'callback_data' => 'product_2',
                        ]
                    ),

                ],
                [
                    new InlineKeyboardButton(
                        [
                            'text' => 'محصول 3 2000 هزار تومان',
                            'callback_data' => 'product_3',
                        ]
                    ),

                ],
                [
                    new InlineKeyboardButton(
                        [
                            'text' => 'بازگشت',
                            'callback_data' => 'backbtn_Product_step1',
                        ]
                    ),

                ]);
        return (object)["text"=>$text,'reply_markup'=>$products_buttons];
    }
}
