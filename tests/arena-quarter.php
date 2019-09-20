<?php
        $this->browse(function ($browser) {
            $browser->visit(env('APP_URL'))
                    ->assertSee('With restaurants, bars, clubs')
                    ->assertSee('02271353');

            $browser->visit(env('APP_URL') . '/first-direct-arena')
                    ->assertSee('Find out what\'s coming up')
                    ->assertSee('02271353');

            $browser->visit(env('APP_URL') . '/units')
                    ->assertSee('KFC')
                    ->assertSee('02271353')
                    ->assertSee('There\'s plenty of choice at Leeds\' Arena Quarter.');

            $browser->visit(env('APP_URL') . '/promotions-events')
                    ->assertSee('Your chance to see what\'s happening')
                    ->assertSee('02271353')
                    ->assertSee('Promotions & Events');

            $browser->visit(env('APP_URL') . '/contact')
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
        });
?>