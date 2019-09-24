<?php
    $this->browse(function ($browser) {
        $Year = date("Y");
        $Month = date("n");
        $Day = date("j");

        $browser->visit(env('APP_URL'))
                ->click('button[id="parking-departing-trigger"]')
                ->click('#airport-parking > div > form.js-parking-widget-v2.\|.parking-widget-v2.-step-1.relative.z-20 > div.js-parking-widget-v2-1.\|.parking-widget-v2-step-1.relative > div > div > table > tbody > tr:nth-child(4) > td:nth-child(5) > button')
                ->pause(1000)
                ->click('#parking-departing-location > ul > li:nth-child(2) > div.flex-auto.sm\:w-full.sm\:table-cell.pt-4.sm\:pb-4')
                ->pause(1000)
                ->click('#airport-parking > div > form.js-parking-widget-v2.\|.parking-widget-v2.-step-1.relative.z-20.-step-2.-step-3 > div.js-parking-widget-v2-3.\|.parking-widget-v2-step-3.relative.border.border-grey-light.invalid\:border-red-50.mt-3 > button')
                ->pause(1000)
                ->click('#parking-departing-flight-options-0 > div.flex-auto.sm\:w-full.sm\:table-cell.pt-4.sm\:pb-4')
                ->pause(1000)
                ->click('#parking-returning-trigger')
                ->pause(1000)
                ->click('#airport-parking > div > form.js-parking-widget-v2.\|.parking-widget-v2.-step-1.relative.z-20.-step-2.-step-3.-step-4 > div.js-parking-widget-v2-4.\|.parking-widget-v2-step-4.relative.mt-3 > div > div > table > tbody > tr:nth-child(4) > td:nth-child(7) > button')
                ->pause(1000)
                ->click('#airport-parking > div > form.js-parking-widget-v2.\|.parking-widget-v2.-step-1.relative.z-20.-step-2.-step-3.-step-4.-step-5 > div.js-parking-widget-v2-5.\|.parking-widget-v2-step-5.relative.border.border-grey-light.invalid\:border-red-50.mt-3 > button')
                ->pause(1000)
                ->click('#parking-returning-flight-options-0')
                ->pause(1000)
                ->click('#airport-parking > div > form.js-parking-widget-v2.\|.parking-widget-v2.-step-1.relative.z-20.-step-2.-step-3.-step-4.-step-5.-step-6 > div.js-parking-widget-v2-6.\|.mt-3 > div > button')
                ->pause(5000);
    });
?>