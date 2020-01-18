<?php

use Illuminate\Database\Seeder;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $r1 = [
        	'user_id'		=> 2,
        	'discussion_id'	=> 1,
        	'content'		=> 'Morbi sed nisi venenatis, ultrices risus quis, mattis magna. Fusce libero magna, semper a tincidunt a, scelerisque vitae felis. Suspendisse potenti. Cras ut erat dui. Vestibulum vehicula nulla metus, faucibus lacinia elit accumsan quis. Praesent maximus arcu elit, eget maximus nunc tristique ut. Sed fringilla ex velit, eu pretium turpis elementum et. Mauris dictum dignissim efficitur. Suspendisse potenti. In hac habitasse platea dictumst. Duis nulla sapien, convallis et porta in, placerat quis libero. Morbi viverra ut est id sollicitudin. Curabitur eros augue, tristique sit amet rutrum a, venenatis eget est. '
        ];

        $r2 = [
        	'user_id'		=> 2,
        	'discussion_id'	=> 2,
        	'content'		=> 'Fusce accumsan sapien ac quam lobortis egestas. Mauris massa enim, consequat non vestibulum a, fringilla id ex. Donec et eros luctus, aliquet elit id, sagittis tellus. Sed viverra turpis eu tellus rhoncus rhoncus. Nam non orci feugiat, mollis lorem et, sodales lacus. Mauris ac justo iaculis, suscipit massa quis, pharetra nisl. Sed id ligula lacus. Morbi pulvinar sapien et nibh sollicitudin vestibulum.'
        ];

        $r3 = [
        	'user_id'		=> 2,
        	'discussion_id'	=> 3,
        	'content'		=> 'Proin bibendum, turpis quis laoreet rhoncus, nulla libero interdum augue, a consectetur sapien elit eu turpis. Integer tincidunt neque dui, ut semper eros lacinia vel. In ultrices, elit sit amet gravida laoreet, diam sem porttitor libero, ac sagittis metus urna ac augue. Nunc gravida nisi pretium lobortis congue. Morbi faucibus quis nunc vel malesuada. Praesent efficitur pellentesque urna nec fringilla. Sed pretium magna vel erat ultricies accumsan. '
        ];

        $r4 = [
        	'user_id'		=> 2,
        	'discussion_id'	=> 4,
        	'content'		=> 'Integer bibendum at lacus ac pulvinar. Quisque varius a urna nec pellentesque. Phasellus ultrices magna vel dolor auctor, eget malesuada ex rutrum. Aliquam quis diam nibh. Proin consectetur iaculis pharetra. Etiam sollicitudin, quam a malesuada auctor, sapien justo sollicitudin metus, nec aliquam ante purus quis ante. In molestie libero vestibulum felis accumsan aliquet. Cras vel velit congue, cursus tortor varius, iaculis dolor.'
        ];

        App\Reply::create($r1);
        App\Reply::create($r2);
        App\Reply::create($r3);
        App\Reply::create($r4);


    }
}
