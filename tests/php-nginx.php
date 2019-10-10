<?php

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

/*------------------------------
          This is a
          test for
          the HTML
          page.
-------------------------------*/

    $URL = env('APP_URL') . '/html.html';
    
    function get_http_response_code($URL) {
      $headers = get_headers($URL);
      return substr($headers[0], 9, 3);
    }
    
    $Code = get_http_response_code($URL);
    
    if ( $Code == 200 ) {
        echo '+----------------------------+' . PHP_EOL;
        echo '|  ✅ : Returned 200 (Woop)  |' . PHP_EOL;
        echo '+----------------------------+' . PHP_EOL . PHP_EOL;
    } else {
        echo '+--------------------------------------------------------------------+' . PHP_EOL;
        echo '|  ❌❌❌ : Test Failed, expected HTTP response of 200, but got ' . $Code . '  |' . PHP_EOL;
        echo '+--------------------------------------------------------------------+';
        exit(1);
    }

    $this->browse(function ($browser) {
        $URL = env('APP_URL') . '/html.html';

        $browser->visit($URL)
                ->assertSee('Hello from HTML');
    });


/*------------------------------
          This is a
          test for
          the PHP
          page.
-------------------------------*/


    $URL = env('APP_URL') . '/php.php';
    
    $Code = get_http_response_code($URL);
    
    if ( $Code == 200 ) {
        echo '+----------------------------+' . PHP_EOL;
        echo '|  ✅ : Returned 200 (Woop)  |' . PHP_EOL;
        echo '+----------------------------+' . PHP_EOL . PHP_EOL;
    } else {
        echo '+--------------------------------------------------------------------+' . PHP_EOL;
        echo '|  ❌❌❌ : Test Failed, expected HTTP response of 200, but got ' . $Code . '  |' . PHP_EOL;
        echo '+--------------------------------------------------------------------+';
        exit(1);
    }

    $this->browse(function ($browser) {
        $URL = env('APP_URL') . '/php.php';

        $browser->visit($URL)
                ->assertSee('Hello from PHP');
    });


/*------------------------------
          This is a
          test for
          a PHP 500
          error page.
-------------------------------*/

    $URL = env('APP_URL') . '/php-error.php';
    
    $Code = get_http_response_code($URL);
    
    if ( $Code == 500 ) {
        echo '+----------------------------+' . PHP_EOL;
        echo '|  ✅ : Returned 500 (Woop)  |' . PHP_EOL;
        echo '+----------------------------+' . PHP_EOL . PHP_EOL;
    } else {
        echo '+--------------------------------------------------------------------+' . PHP_EOL;
        echo '|  ❌❌❌ : Test Failed, expected HTTP response of 500, but got ' . $Code . '  |' . PHP_EOL;
        echo '+--------------------------------------------------------------------+';
        exit(1);
    }
/*------------------------------
          This is a
          test for
          the PHP
          info page.
-------------------------------*/

$URL = env('APP_URL') . '/php-info.php';

$Code = get_http_response_code($URL);

if ($Code == 200) {
        echo '+----------------------------+' . PHP_EOL;
        echo '|  ✅ : Returned 200 (Woop)  |' . PHP_EOL;
        echo '+----------------------------+' . PHP_EOL . PHP_EOL;
} else {
        echo '+--------------------------------------------------------------------+' . PHP_EOL;
        echo '|  ❌❌❌ : Test Failed, expected HTTP response of 200, but got ' . $Code . '  |' . PHP_EOL;
        echo '+--------------------------------------------------------------------+';
        exit(1);
    }

//    $this->browse(function ($browser) {
//
//        $URL = env('APP_URL') . '/php-info.php';
//
//        if (env('PHP_VERSION') == NULL) {
//            echo '+-------------------------------------------+' . PHP_EOL;
//            echo '|   ❌❌❌ : Couldn\'t Detect PHP Version   |' . PHP_EOL;
//            echo '+-------------------------------------------+' . PHP_EOL . PHP_EOL;
//            echo 'Please set the \'PHP_VERSION\' enviroment variable. Example: 7.1';
//        }
//
//        $browser->visit($URL)
//                ->assertSee('PHP Version '.$Version);
//    });

/*------------------------------
          This is a
          test for
          PHP
          uploads.
-------------------------------*/

$fileName = str_shuffle('VeGQdH TZM 4P87');

$genFile = new Process(['dd', 'if=/dev/urandom', 'of='.env('TESTS_DIR').'assets/'.$fileName, 'bs=1049000', 'count=1']);
$genFile->run();

if (!$genFile->isSuccessful()) {
        echo '+-------------------------------+' . PHP_EOL;
        echo '|   ❌❌❌ : File Gen Failed!   |' . PHP_EOL;
        echo '+-------------------------------+' . PHP_EOL . PHP_EOL;
        echo 'Not quite sure why...';
        exit(1);
}

$md5 = md5_file(env('TESTS_DIR').'assets/'.$fileName);

$pushFile = new Process(['curl', '-F', 'fileToUpload=@'.env('TESTS_DIR').'assets/'.$fileName, 'https://php71-test.parallax.dev/upload.php']);
$pushFile->run();


$fileName = str_replace(' ', '\ ', $fileName);
exec('rm '.env('TESTS_DIR').'assets/'.$fileName);

// executes after the command finishes
if (!$pushFile->isSuccessful()) {
        echo '+-----------------------------+' . PHP_EOL;
        echo '|   ❌❌❌ : Upload Failed!   |' . PHP_EOL;
        echo '+-----------------------------+' . PHP_EOL . PHP_EOL;
        echo 'Either the file to upload is missing, or curl isn\'t working';
        exit(1);
}

$return = $pushFile->getOutput();

if ($return == $md5) {
        echo '+----------------------------+' . PHP_EOL;
        echo '|   ✅ : Upload Succeeded!   |' . PHP_EOL;
        echo '+----------------------------+' . PHP_EOL . PHP_EOL;
        echo 'Response MD5: ' . $return . PHP_EOL;
        echo '  Actual MD5: ' . $md5  . PHP_EOL . PHP_EOL;
} else {
        echo '+-----------------------------+' . PHP_EOL;
        echo '|   ❌❌❌ : Upload Failed!   |' . PHP_EOL;
        echo '+-----------------------------+' . PHP_EOL . PHP_EOL;
        echo 'Response MD5: ' . $return . PHP_EOL;
        echo '  Actual MD5: ' . $md5;
        echo $return  . PHP_EOL . PHP_EOL;
}

/*------------------------------
          This is a
          test for
          a PHP 403
          error page.
-------------------------------*/

    $URL = env('APP_URL') . '/forbidden/';
    
    $Code = get_http_response_code($URL);
    
    if ( $Code == 403 ) {
        echo '+----------------------------+' . PHP_EOL;
        echo '|  ✅ : Returned 403 (Woop)  |' . PHP_EOL;
        echo '+----------------------------+' . PHP_EOL . PHP_EOL;
    } else {
        echo '+--------------------------------------------------------------------+' . PHP_EOL;
        echo '|  ❌❌❌ : Test Failed, expected HTTP response of 403, but got ' . $Code . '  |' . PHP_EOL;
        echo '+--------------------------------------------------------------------+';
        exit(1);
    }

/*------------------------------
          This is a
          test for
          a PHP 404
          error page.
-------------------------------*/

    $URL = env('APP_URL') . '/aaaaaaaaaaaa';
    
    $Code = get_http_response_code($URL);
    
    if ( $Code == 404 ) {
        echo '+----------------------------+' . PHP_EOL;
        echo '|  ✅ : Returned 404 (Woop)  |' . PHP_EOL;
        echo '+----------------------------+' . PHP_EOL . PHP_EOL;
    } else {
        echo '+--------------------------------------------------------------------+' . PHP_EOL;
        echo '|  ❌❌❌ : Test Failed, expected HTTP response of 404, but got ' . $Code . '  |' . PHP_EOL;
        echo '+--------------------------------------------------------------------+';
        exit(1);
    }

/*------------------------------
          This is a
          test for
          a PHP 504
          error page.
-------------------------------*/

    $URL = env('APP_URL') . '/timeout.php';
    
    $Code = get_http_response_code($URL);
    
    if ( $Code == 504 ) {
        echo '+----------------------------+' . PHP_EOL;
        echo '|  ✅ : Returned 504 (Woop)  |' . PHP_EOL;
        echo '+----------------------------+' . PHP_EOL . PHP_EOL;
    } else {
        echo '+--------------------------------------------------------------------+' . PHP_EOL;
        echo '|  ❌❌❌ : Test Failed, expected HTTP response of 504, but got ' . $Code . '  |' . PHP_EOL;
        echo '+--------------------------------------------------------------------+';
        exit(1);
    }

?>