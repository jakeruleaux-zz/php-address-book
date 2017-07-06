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
        return $app['twig']->render('address.html.twig', array('contacts' => Contact::getAll()));
    });

    $app->post("/create", function() use ($app) {
        $contact = new Contact($_POST['name'], $_POST['last'], $_POST['address'], $_POST['phone'], $_POST['email']);
        $contact->save();
        return $app['twig']->render('create.html.twig', array('newContact' => $contact));
    });

    $app->post("/delete", function() use ($app) {
       Contact::deleteAll();
       return $app['twig']->render('delete_contacts.html.twig');
    });

    $app->get("/search", function() use ($app) {
       $finds = Contact::getAll();
       $finds_match_name = array();

       if (empty($finds_match_name) == true) {
           foreach ($finds as $find) {
               if ($find->getName() == $_GET['search']) {
                   array_push($finds_match_name, $find);
               }
           }
       }

       return $app['twig']->render('search.html.twig', array('find' => $finds_match_name));

    });

    return $app;
?>
