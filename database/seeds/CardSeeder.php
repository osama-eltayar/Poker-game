<?php

use App\Card;
use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['C','D','H','S'] ;
        $values =array_merge(['J','A','Q','K'], range("2", "10"));
        foreach ($values as $value) {
            foreach ($types as $type) {
                factory(App\Card::class)->create([
                    'suit'=>$type,
                    'value'=>$value
                ]);
            }
        }
    }
}
