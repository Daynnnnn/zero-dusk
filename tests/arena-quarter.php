<?php
        $this->browse(function ($browser) {
            $browser->visit('https://arena-quarter.' . env('APP_ENV') . '.prlx.io')
                    ->assertSee('With restaurants, bars, clubs')
                    ->assertSee('02271353');

            $browser->visit('https://arena-quarter.' . env('APP_ENV') . '.prlx.io/first-direct-arena')
                    ->assertSee('Find out what\'s coming up')
                    ->assertSee('02271353');

            $browser->visit('https://arena-quarter.' . env('APP_ENV') . '.prlx.io/units')
                    ->assertSee('KFC')
                    ->assertSee('02271353')
                    ->assertSee('There\'s plenty of choice at Leeds\' Arena Quarter.');

            $browser->visit('https://arena-quarter.' . env('APP_ENV') . '.prlx.io/promotions-events')
                    ->assertSee('Your chance to see what\'s happening')
                    ->assertSee('02271353')
                    ->assertSee('Promotions & Events');

            $browser->visit('https://arena-quarter.' . env('APP_ENV') . '.prlx.io/contact')
            		->assertSee('Fill in the form below and we\'ll get back to you as soon as we can.')
            		->click('button[class="select__label select__label--placeholder js-select-label"]')
            		->click('button[data-value="General"]')
                    ->type('#contact-form-firstname', 'Dusk')
                    ->type('#contact-form-lastname', 'Testing')
                    ->type('#contact-form-email', 'dusk@parall.ax')
                    ->type('#contact-form-phone', '07777777777')
                    ->type('#contact-form-enquiry', 'Please ignore. Automated test run by Parallax.');
                    $browser->script('window.scrollTo(0, 400);');
                    $browser->click('button[class="btn btn--teal btn--large  "]')
                    ->pause(1000)
                    ->assertSee('Message has been sent successfully')
                    ->assertSee('02271353');

            $browser->visit('https://arena-quarter.' . env('APP_ENV') . '.prlx.io/admin')
                    ->type('#email', 'dusk@parall.ax')
                    ->type('#password', 'NotARealPassword')
                    ->click('button[class="ex-btn ex-btn--primary login__submit js-login__submit"]')
                    ->assertSee('Incorrect login details. Please check and try again.');
        });
?>