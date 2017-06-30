<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Address.php";

    session_start();
    if(empty($_SESSION['list_of_contacts'])) {
        $_SESSION['list_of_contacts'] = array();
    }
    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('address.html.twig', array('address' => Contact::getAll()));
    });

    $app->post("/create", function() use ($app) {
        $contact = new Contact($_POST['name'], $_POST['address'], $_POST['phone']);
        $contact->save();
        return $app['twig']->render('create.html.twig', array('newcontact' => $contact));
    });

    return $app;
?>
