<?php
        $this->browse(function ($browser) {
            $browser->visit('https://cauldron-2018.' . env('APP_ENV') . '.parallax.dev')
                    ->assertSee('1752242 (GB)')
                    ->assertSee('WE MAKE');

            $browser->visit('https://cauldron-2018.' . env('APP_ENV') . '.parallax.dev/recipes')
                    ->assertSee('Find your favourite recipe today!')
                    ->assertSee('1752242 (GB)')
                    ->assertSee('ALL RECIPES');

            $browser->visit('https://cauldron-2018.' . env('APP_ENV') . '.parallax.dev/products')
                    ->assertSee('OUR PRODUCTS')
                    ->assertSee('1752242 (GB)')
                    ->assertSee('Nothing says ‘sharing’ quite like falafel.');

            $browser->visit('https://cauldron-2018.' . env('APP_ENV') . '.parallax.dev/explore')
                    ->assertSee('THE KNOWLEDGE HUB')
                    ->assertSee('THE COOKBOOK LIBRARY')
                    ->assertSee('1752242 (GB)')
                    ->assertSee('BE INSPIRED BY OUR BLOG');

            $browser->visit('https://cauldron-2018.' . env('APP_ENV') . '.parallax.dev/about')
                    ->assertSee('WE\'RE ALWAYS LISTENING')
                    ->assertSee('WHAT OUR FANS ARE SAYING')
                    ->assertSee('1752242 (GB)')
                    ->assertSee('ACHIEVEMENTS');

            $browser->visit('https://cauldron-2018.' . env('APP_ENV') . '.parallax.dev/contact')
                    ->type('#txtName', 'Dusk Testing')
                    ->type('#txtEmail', 'dusk@parall.ax')
                    ->type('#txtMessage', 'Automated test message from Parallax, please ignore.')
                    ->assertSee('1752242 (GB)')
                    ->click('button[class="btn btn-green btn-md mb-auto ml-15"]')
                    ->assertSee('We\'ve recieved your request');

            $browser->visit('https://cauldron-2018.' . env('APP_ENV') . '.parallax.dev/admin')
                    ->type('#email', 'dusk@parall.ax')
                    ->type('#password', 'NotARealPassword')
                    ->click('button[class="ex-btn ex-btn--primary login__submit js-login__submit"]')
                    ->assertSee('Incorrect login details. Please check and try again..');
        });
?>