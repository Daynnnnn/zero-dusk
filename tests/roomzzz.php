<?php
        $this->browse(function ($browser) {
            $browser->visit(env('APP_URL'))
                    ->assertSee('ROOM TO BE YOURSELF')
                    ->assertSee('CHOOSE YOUR NEXT ADVENTURE')
                    ->assertSee(' All Rights Reserved');

            $browser->visit(env('APP_URL') . '/locations/chester-cityy')
                    ->assertSee('VISIT US IN OUR CHESTER CITY APARTHOTEL')
                    ->visit(env('APP_URL') . '/locations/leeds-city')
                    ->assertSee('VISIT US IN OUR LEEDS APARTHOTEL')
                    ->visit(env('APP_URL') . '/locations/leeds-city')
                    ->assertSee('VISIT US IN OUR LEEDS APARTHOTEL')
                    ->visit(env('APP_URL') . '/locations/leeds-city')
                    ->assertSee('VISIT US IN OUR LEEDS APARTHOTEL')
                    ->visit(env('APP_URL') . '/locations/leeds-city')
                    ->assertSee('VISIT US IN OUR LEEDS APARTHOTEL');
        });
?>