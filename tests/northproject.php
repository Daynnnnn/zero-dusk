<?php
        $this->browse(function ($browser) {
            $browser->visit(env('APP_URL'))
                    ->assertSee('We are a brand and')
                    ->assertSee('Featured by Apple – Fllike is a free and beautifully simple')
                    ->assertSee('09419901');

            $browser->visit(env('APP_URL') . '/who')
                    ->assertSee('Creators & Makers')
                    ->assertSee('North Project was founded as a mobile-first digital')
                    ->assertSee('09419901');

            $browser->visit(env('APP_URL') . '/what')
                    ->assertSee('We combine human-centered design')
                    ->assertSee('Explore & Discover')
                    ->assertSee('Design & Develop')
                    ->assertSee('Launch & Learn')
                    ->assertSee('Evolve & Enhance')
                    ->assertSee('We’re a digital design and innovation consultancy.')
                    ->assertSee('09419901');

            $browser->visit(env('APP_URL') . '/projects')
                    ->assertSee('We discover, design, develop and deliver digital')
                    ->assertSee('Moda Living - Digital Strategy & Design')
                    ->assertSee('All Steels Trading - Web Application')
                    ->assertSee('Fllike iOS Application - Venture Project')
                    ->assertSee('CrimeMapp iOS Application - UI Design')
                    ->assertSee('09419901');
        });
?>