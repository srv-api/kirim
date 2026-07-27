<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ShiftTemplate;

class ShiftTemplateSeeder extends Seeder
{
    public function run(): void
    {

        $shifts = [

            ['name'=>'NS1','start'=>'08:00','end'=>'17:00'],
            ['name'=>'NS2','start'=>'07:00','end'=>'15:00'],
            ['name'=>'NS3','start'=>'07:00','end'=>'12:00'],

            ['name'=>'P6','start'=>'08:00','end'=>'20:00'],
            ['name'=>'P7','start'=>'08:00','end'=>'16:00'],
            ['name'=>'P8','start'=>'08:00','end'=>'13:00'],
            ['name'=>'P9','start'=>'08:45','end'=>'17:00'],

            ['name'=>'MD1','start'=>'09:00','end'=>'16:00'],
            ['name'=>'MD2','start'=>'10:00','end'=>'17:00'],
            ['name'=>'MD3','start'=>'11:00','end'=>'18:00'],
            ['name'=>'MD4','start'=>'10:45','end'=>'18:00'],
            ['name'=>'MD5','start'=>'11:45','end'=>'19:00'],

            ['name'=>'S1','start'=>'13:45','end'=>'21:00'],
            ['name'=>'S2','start'=>'11:00','end'=>'16:00'],
            ['name'=>'S3','start'=>'12:00','end'=>'20:00'],
            ['name'=>'S4','start'=>'12:45','end'=>'20:00'],
            ['name'=>'S5','start'=>'13:30','end'=>'20:00'],
            ['name'=>'S6','start'=>'14:00','end'=>'21:00'],

            ['name'=>'P1','start'=>'06:45','end'=>'14:00'],
            ['name'=>'P2','start'=>'05:45','end'=>'13:00'],
            ['name'=>'P3','start'=>'06:30','end'=>'14:00'],
            ['name'=>'P4','start'=>'07:00','end'=>'16:00'],
            ['name'=>'P5','start'=>'07:00','end'=>'14:00'],

            ['name'=>'DJ Pagi','start'=>'07:00','end'=>'14:00'],
            ['name'=>'DJ Siang','start'=>'14:00','end'=>'21:00'],
            ['name'=>'DJ Malam','start'=>'21:00','end'=>'07:00'],

            ['name'=>'M1','start'=>'20:45','end'=>'07:00'],
            ['name'=>'M2','start'=>'20:00','end'=>'08:00'],
            ['name'=>'M3','start'=>'19:30','end'=>'07:00'],
            ['name'=>'M4','start'=>'19:45','end'=>'06:00'],
            ['name'=>'M5','start'=>'21:00','end'=>'07:00'],

            ['name'=>'P10','start'=>'04:30','end'=>'11:30'],
            ['name'=>'P11','start'=>'06:00','end'=>'11:00'],
            ['name'=>'P12','start'=>'06:00','end'=>'14:00'],

            ['name'=>'LS1','start'=>'06:45','end'=>'21:00'],
            ['name'=>'LS2','start'=>'13:45','end'=>'07:00'],

            ['name'=>'CUTI','start'=>'08:00','end'=>'17:00'],
            ['name'=>'OFF','start'=>'08:00','end'=>'17:00'],

            ['name'=>'P/S','start'=>'08:00','end'=>'20:00'],
            ['name'=>'S/M','start'=>'20:00','end'=>'08:00'],

            ['name'=>'MD6','start'=>'08:00','end'=>'15:00'],
            ['name'=>'MD7','start'=>'13:00','end'=>'20:00'],
        ];

        foreach($shifts as $shift){

            ShiftTemplate::create([
                'name' => $shift['name'],
                'start_time' => $shift['start'],
                'end_time' => $shift['end'],
                'late_tolerance' => 10,
                'is_active' => 1
            ]);

        }

    }
}