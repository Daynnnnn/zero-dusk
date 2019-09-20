<?php
        $this->browse(function ($browser) {
            $browser->visit(env('APP_URL'))
                    ->pause(2000)
                    ->assertSee('Ducie House,')
                    ->assertSee('Unique Workspace in')
                    ->assertSee('Currently offering 64 office')
                    ->assertSee('In the past 20 years, Ducie House')
                    ->assertSee('Gallery')
                    ->assertSee('Availability')
                    ->assertSee('Tenants Include')
                    ->assertSee('info@tcs-plc.co.uk')
                    ->assertSee('© 2018 Town Centre Securities');
        });
?>