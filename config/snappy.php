<?php

return array(


    'pdf' => array(
        'enabled' => true,
        'binary'  => base_path().'/vendor/jshmrtn/wkhtmltopdf-osx-x86-64/bin/wkhtmltopdf-osx-x86-64',
        'timeout' => false,
        'options' => array(),//array('margin-top'=>'0', 'margin-right'=>'0','margin-bottom'=>'0', 'margin-left'=>'0'),
        'env'     => array(),
    ),
    'image' => array(
        'enabled' => true,
        'binary'  => base_path().'\vendor\jshmrtn\wkhtmltopdf-osx-x86-64\bin\wkhtmltoimg-osx-x86-64',
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),


);
