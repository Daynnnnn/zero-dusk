<?php
        $this->browse(function ($browser) {
            $browser->visit('https://northproject.' . env('APP_ENV') . '.prlx.io')
                    ->assertSee('We are a brand and')
                    ->assertSee('Featured by Apple – Fllike is a free and beautifully simple')
                    ->assertSee('09419901');

            $browser->visit('https://northproject.' . env('APP_ENV') . '.prlx.io/who')
                    ->assertSee('Creators & Makers')
                    ->assertSee('North Project was founded as a mobile-first digital')
                    ->assertSee('09419901');

            $browser->visit('https://northproject.' . env('APP_ENV') . '.prlx.io/what')
                    ->assertSee('We combine human-centered design')
                    ->assertSee('Explore & Discover')
                    ->assertSee('Design & Develop')
                    ->assertSee('Launch & Learn')
                    ->assertSee('Evolve & Enhance')
                    ->assertSee('We’re a digital design and innovation consultancy.')
                    ->assertSee('09419901');

            $browser->visit('https://northproject.' . env('APP_ENV') . '.prlx.io/projects')
                    ->assertSee('We discover, design, develop and deliver digital')
                    ->assertSee('Moda Living - Digital Strategy & Design')
                    ->assertSee('All Steels Trading - Web Application')
                    ->assertSee('Fllike iOS Application - Venture Project')
                    ->assertSee('CrimeMapp iOS Application - UI Design')
                    ->assertSee('09419901');

            $browser->visit('https://' . env('SITE') . '.' . env('APP_ENV') . '.prlx.io/admin')
                    ->type('#email', 'dusk@parall.ax')
                    ->type('#password', 'NotARealPassword')
                    ->click('button[class="ex-btn ex-btn--primary login__submit js-login__submit"]')
                    ->assertSee('Incorrect login details. Please check and try again.');
        });
?>