<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
    }
}

class AdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ads')->insert([
            [
                'title' => 'Ad 1',
                'description' => 'record 1',
                'image' => 'Hz4luS8vXhzYw8TMwzi7kvmsQyuXsnta.png',
                'authorName' => 'Victor',
                'user_id' => 2,
                'text' => str_replace(array('\r\n', '\n', '\r'), "\n", '<p>Lorem Ipsum є псевдо- латинський текст використовується у веб - дизайні, типографіка, верстка, і друку замість англійської підкреслити елементи дизайну над змістом.</p>\n'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'title' => 'Ad 2',
                'description' => 'record 2',
                'image' => 'edRpYvqijST2W2sv9FeSxkMzBmNFrTZj.jpg',
                'authorName' => 'Victor',
                'user_id' => 2,
                'text' => str_replace(array('\r\n', '\n', '\r'), "\n", '<p>Це також називається заповнювач ( або наповнювач) текст. Це зручний інструмент для макетів.</p>\n'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'title' => 'Ad 3',
                'description' => 'record 3',
                'image' => 'HFA9jIlzHXts6cjIONVnx6pBLa8Q6Jzs.jpg',
                'authorName' => 'Maksim',
                'user_id' => 1,
                'text' => str_replace(array('\r\n', '\n', '\r'), "\n", '<p>Це допомагає намітити візуальні елементи в документ або презентацію, наприклад, друкарня, шрифт, або макет.</p>\n'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'title' => 'Ad 4',
                'description' => 'record 4',
                'image' => '0QWk0nF6tjBRExJmSrzzTvPtbBs6VSrc.jpg',
                'authorName' => 'Maksim',
                'user_id' => 1,
                'text' => str_replace(array('\r\n', '\n', '\r'), "\n", '<p>Lorem Ipsum в основному частиною латинського тексту за класичною автор і філософа Цицерона. Це слова і букви були змінені додаванням або видаленням, так навмисно роблять його зміст безглуздо, це не є справжньою, правильно чи зрозумілою Латинської більше.</p>\n'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'title' => 'Ad 5',
                'description' => 'record 5',
                'image' => 'bUZiL9ntbpVBRhlFBUOkscC1vGLtW9Vk.jpg',
                'authorName' => 'Maksim',
                'user_id' => 1,
                'text' => str_replace(array('\r\n', '\n', '\r'), "\n", '<p>У той час як Lorem Ipsum все ще нагадує класичну латину, він насправді не має ніякого значення. Як текст Цицерона не містить літери K, W, або Z, чужі латина, ці та інші часто вставляється випадково імітувати типографський Зовнішність європейських мовах, як і орграфов будуть знайдено в оригіналі.</p>\n'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'title' => 'Ad 6',
                'description' => 'record 6',
                'image' => 'IrNGiBE3hnP9CQ4kklTH4wENS4tEWTff.jpg',
                'authorName' => 'Maksim',
                'user_id' => 1,
                'text' => str_replace(array('\r\n', '\n', '\r'), "\n", '<p>У професійному контексті це часто буває, що приватні або корпоративні клієнти Corder публікацію, які будуть зроблені і представлені з фактичний зміст все ще не готовий.</p>\n'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'title' => 'Ad 7',
                'description' => 'record 7',
                'image' => 'FNyPiADEU1AdIse7Mee0YvefIQe44qmG.jpg',
                'authorName' => 'Maksim',
                'user_id' => 1,
                'text' => str_replace(array('\r\n', '\n', '\r'), "\n", '<p>Подумайте про прес- блозі, що наповнилися змістом погодинна в день буде жити. Однак рецензенти схильні відволікатися на зрозумілій змісту, скажімо, випадкового тексту, скопійованого з газети або в інтернеті., Швидше за все, зосередитися на тексті, не звертаючи уваги на макет і його елементів.</p>\n'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'title' => 'Ad 8',
                'description' => 'record 8',
                'image' => 'c2lPJOxDgw9ljhzlxJWQeV7AzaQGIJhv.jpg',
                'authorName' => 'Maksim',
                'user_id' => 1,
                'text' => str_replace(array('\r\n', '\n', '\r'), "\n", '<p>Крім того, випадковий текст ризикує бути ненавмисно гумористичні або образливим, неприйнятним ризиком в корпоративному середовищі. Lorem Ipsum і його численні варіанти були використані з початку 1960 -х років, і цілком імовірно, починаючи з шістнадцятого століття.</p>\n'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'title' => 'Ad 9',
                'description' => 'record 9',
                'image' => 'WsOAsOLA2C8p5Zke1SDLx2RSg2uluMUz.jpg',
                'authorName' => 'Maksim',
                'user_id' => 1,
                'text' => str_replace(array('\r\n', '\n', '\r'), "\n", '<p>Велика частина його тексту складається з розділів 1.10.32-3 з Цицерона De finibus bonorum ін malorum ( на кордонах добра і зла ; finibus може alspo перекласти як цілей). Neque Порро quisquam Передбачуване Квай dolorem Ipsum Quia Dolor сидіти Амет, consectetur, adipisci велить є першим відомим версія (&quot;І немає ні тих, хто любить горе себе, так як це горе і, таким чином, хоче отримати його &quot; ​​).</p>\n'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'title' => 'Ad 10',
                'description' => 'record 10',
                'image' => 'c74vsGbdq2CLxW5xrOQ102ZF9jyJesje.jpg',
                'authorName' => 'Maksim',
                'user_id' => 1,
                'text' => str_replace(array('\r\n', '\n', '\r'), "\n", '<p>Було встановлено, Річард МакКлінток, філолог, директор видань в Хемпден - Sydney College в штаті Вірджинія; він шукав citings з consectetur &quot; в класичній латинської літератури, в термін дивно низької частоти в цьому корпусу літератури. Lorem Ipsum інформації</p>\n'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'title' => 'Ad 11',
                'description' => 'record 11',
                'image' => 'JgS7rhf1VQ7VxjQVz3uM6zXnzaDKq728.jpg',
                'authorName' => 'Maksim',
                'user_id' => 1,
                'text' => str_replace(array('\r\n', '\n', '\r'), "\n", '<h1>Версія Цицерона з Liber Primus (перша книга ), розділи 1.10.32-3 ( фрагменти включені в більшості варіантів Lorem Ipsum в червоний ):</h1>\n\n<p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia&nbsp;dolor sit amet, consectetur, adipisci[ng]&nbsp;velit, sed&nbsp;quia non numquam&nbsp;[do] eius modi&nbsp;tempora&nbsp;inci[di]dunt, ut labore et dolore magnam&nbsp;aliquam&nbsp;quaerat voluptatem.&nbsp;Ut enim ad minima&nbsp;veniam, quis nostrum&nbsp;exercitationem&nbsp;ullam corporis suscipit&nbsp;laboriosam,&nbsp;nisi ut aliquid ex ea commodi&nbsp;consequatur?&nbsp;Quis autem vel eum&nbsp;iure reprehenderit,&nbsp;qui&nbsp;in&nbsp;ea&nbsp;voluptate velit esse, quam nihil molestiae&nbsp;consequatur, vel&nbsp;illum, qui&nbsp;dolorem&nbsp;eum&nbsp;fugiat, quo voluptas&nbsp;nulla pariatur?&nbsp;більш</p>\n'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ]);
    }
}

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'Admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Moderator',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Guest',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            [
                'username' => 'Maksim',
                'password' => '$2y$10$YXxu99jRwKkK8hwqYmFcOOLUD7cMcYiQ3.Te1QCf..dVFX8gVgniO', //123456
                'remember_token' =>'xDlt92luswaKGkRsskYH53tHbkPruuiKVuqSF4jdTpoTsx9n9E6NgSRvnowh',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'username' => 'Victor',
                'password' => '$2y$10$lKZzJn3rVVcgalLH3e72de7SBYbyF3rPLOCebKkgX6OAnZb.j3gEm', //admin123
                'remember_token' =>'HyKLxkJOu2uvLniFdSPNF5a2ecQ9gDNd9zf4mOO68Z0MDQgS737idAyuRVtM',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ]);
    }

}

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('role_user')->insert([
                [
                    'user_id' => 1,
                    'role_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],

                [
                    'user_id' => 2,
                    'role_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],

                [
                    'user_id' => 3,
                    'role_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ]);
    }

}




