Installation
============

::

    "require": {
        ...
        "theodo/esendex-client-bundle": "dev-master"
    },

And run composer:

::

    php composer.phar update theodo/esendex-client-bundle


Configuration
=============

1. Register the bundle in your app/AppKernel.php:

::

    // app/AppKernel.php

    public function registerBundles()
    {
        $bundles = array(
            //vendors, other bundles...
            new Theodo\Bundle\EsendexClient\TheodoEsendexClientBundle(),
        );
    }

2. Configure the bundle

::

    # app/config/config.yml
    theodo_esendex_client:
        username: %esendex_username%
        password: %esendex_password%
        
3. Send the message

    $esendex_client = $container->get('esendex_client');
    $esendex_client->getCommand('MessageDispatcher', array(
        'messages' => array(
            array(
                'from' => '$myName',
                'to' => $phoneNumber,
                'body' => $text,
            )
        ), 'accountreference' => 'EX0123456'
    ))->execute();

