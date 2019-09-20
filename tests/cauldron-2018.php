<?php
        $this->browse(function ($browser) {
            $browser->visit(env('APP_URL'))
                    ->assertSee('1752242 (GB)')
                    ->assertSee('WE MAKE');

            $browser->visit(env('APP_URL') . '/recipes')
                    ->assertSee('Find your favourite recipe today!')
                    ->assertSee('1752242 (GB)')
                    ->assertSee('ALL RECIPES');

            $browser->visit(env('APP_URL') . '/products')
                    ->assertSee('OUR PRODUCTS')
                    ->assertSee('1752242 (GB)')
                    ->assertSee('Nothing says ‘sharing’ quite like falafel.');

            $browser->visit(env('APP_URL') . '/explore')
                    ->assertSee('THE KNOWLEDGE HUB')
                    ->assertSee('THE COOKBOOK LIBRARY')
                    ->assertSee('1752242 (GB)')
                    ->assertSee('BE INSPIRED BY OUR BLOG');

            $browser->visit(env('APP_URL') . '/about')
                    ->assertSee('WE\'RE ALWAYS LISTENING')
                    ->assertSee('WHAT OUR FANS ARE SAYING')
                    ->assertSee('1752242 (GB)')
                    ->assertSee('ACHIEVEMENTS');

            $browser->visit(env('APP_URL') . '/contact')
                    ->type('#txtName', 'Dusk Testing')
                    ->type('#txtEmail', 'dusk@parall.ax')
                    ->type('#txtMessage', 'Automated test message from Parallax, please ignore.')
                    ->assertSee('1752242 (GB)')
                    ->click('button[class="btn btn-green btn-md mb-auto ml-15"]')
                    ->assertSee('We\'ve recieved your request');

            $browser->visit(env('APP_URL') . '/admin')
                    ->type('#email', 'dusk@parall.ax')
                    ->type('#password', 'NotARealPassword')
                    ->click('button[class="ex-btn ex-btn--primary login__submit js-login__submit"]')
                    ->assertSee('Incorrect login details. Please check and try again..');
        });
?>