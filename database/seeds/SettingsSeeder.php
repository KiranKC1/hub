<?php

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('additional_infos')->insert([
            'info' => '{"address":"Khyokeba Marg, Kathmandu","email":"haha@lol.com","phone":"51211323, 65651321"}',
            'alias' => 'contact'
        ]);

        DB::table('additional_infos')->insert([
            'info' => '{"content":"<p style=\"text-align: justify;\" data-mce-style=\"text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum rutrum sagittis bibendum. Vestibulum aliquam euismod lobortis. Phasellus semper rhoncus tempor. Nullam in quam sollicitudin, pellentesque sapien sit amet, semper nisl. Donec et luctus tortor. Donec egestas eleifend tortor eget tincidunt. Morbi cursus blandit mauris sed viverra. Nullam ullamcorper ac sem congue vestibulum. Aenean vel pretium ante. Donec id lorem eget ligula interdum dignissim. Duis eleifend ligula at cursus consectetur. Proin aliquet sagittis ex a eleifend. Donec aliquam id libero vel gravida. Pellentesque vel egestas magna, non dictum ex. Mauris fringilla vulputate dui, sed tincidunt massa blandit ut. Interdum et malesuada fames ac ante ipsum primis in faucibus.<\/p><p style=\"text-align: justify;\" data-mce-style=\"text-align: justify;\">Suspendisse potenti. Integer sed lacus tortor. Donec mollis lectus vel lorem porttitor blandit. Maecenas in venenatis justo, eu malesuada metus. Praesent consectetur, lacus eu accumsan ullamcorper, sem velit facilisis elit, a aliquam metus ex eu purus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc nec leo vel erat ornare lobortis.<\/p><p style=\"text-align: justify;\" data-mce-style=\"text-align: justify;\">Sed libero risus, malesuada id ligula sed, consectetur hendrerit turpis. Pellentesque non eros malesuada, volutpat lacus ut, ornare dolor. Nulla urna dui, vulputate non tempor sit amet, vehicula vulputate neque. Nulla sit amet orci imperdiet, tempus orci a, convallis eros. Duis ac enim pretium, aliquam ligula sed, volutpat risus. Morbi ipsum turpis, molestie nec pellentesque eget, porta at tortor. Morbi fringilla fermentum quam a tincidunt. Nulla vitae finibus dolor. Phasellus ut lacinia massa. Curabitur imperdiet dolor sit amet fringilla molestie. Maecenas in tristique diam. Cras auctor vestibulum pharetra.<\/p><p style=\"text-align: justify;\" data-mce-style=\"text-align: justify;\">Fusce non turpis lobortis erat placerat tristique. Phasellus sed massa ac nulla dapibus ultrices maximus gravida magna. Duis vulputate, nisl vitae hendrerit feugiat, erat purus sagittis arcu, et maximus diam massa a est. Integer mollis enim sapien, sed vehicula magna commodo in. Phasellus quis libero mollis massa vehicula condimentum ac luctus neque. Donec lacinia nisl metus, nec egestas turpis convallis in. Aliquam orci est, fermentum quis tellus ac, vehicula iaculis justo. Proin egestas maximus imperdiet. Phasellus quis laoreet arcu. Morbi hendrerit purus vel lectus ullamcorper, at accumsan leo vestibulum. Duis consectetur arcu velit, eu pretium quam suscipit et. Nullam lobortis felis sit amet ex convallis euismod. Nam et scelerisque ex, eget finibus sapien. Quisque auctor elit augue, in congue turpis vestibulum ultricies. Donec vulputate ullamcorper felis vel consectetur.<\/p><p style=\"text-align: justify;\" data-mce-style=\"text-align: justify;\">Morbi euismod turpis quis lacus ultrices, in gravida nisi gravida. Nullam bibendum auctor dui maximus rutrum. Ut finibus magna at orci elementum, ac consequat dolor accumsan. Nunc varius, velit a tempor efficitur, dolor nisl tempus libero, vulputate semper nisl lectus ac enim. Aliquam erat volutpat. Vestibulum at magna sit amet nisi interdum blandit. Nam pellentesque felis ipsum, ac tincidunt diam cursus vitae. Proin sed efficitur orci. Praesent commodo turpis consequat, imperdiet risus vitae, lacinia ex. Nullam sit amet semper tortor, id blandit eros. Praesent condimentum porta mauris, non lobortis lorem accumsan vel. Maecenas cursus eleifend elit eget pulvinar. Maecenas pulvinar nibh euismod elementum dapibus.00<\/p>","photo":""}',
            'alias' => 'about'
        ]);
    }
}
