<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TemplateEmailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $template_emails = [
            [
                'title' => "Awesome!!! AiGate is the first robot in the world with dual trading algorithm, advanced management risk and predictive data analysis.",
                'banner' => "Facebook_cover_-_1.jpg",
                'description' => "<div>Sign Up now and get free 100 USDT voucher for activate one year licence. Don't miss it, only for limited time until October 31, 2021.<br></div>",
                'voucher' => "WMP4W7V",
                'link' => "https://aigate.trade/register_right/60fec872e356e",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ]

        ];

        \DB::table('template_emails')->insert($template_emails);
    }
}
