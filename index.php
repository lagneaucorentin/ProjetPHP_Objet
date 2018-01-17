<?php
    require_once __DIR__ . '/vendor/autoload.php';

    use Projet\Core\Config\ChainLoader;
    use Projet\Core\Config\Configuration;
    use Projet\Core\Config\CsvFileLoader;
    use Projet\Core\Config\EventJsonFileLoader;
    use Projet\Core\Config\JsonFileLoader;
    use Projet\Core\Controller\ControllerResolver;
    use Projet\Core\Http\Request;
    use Projet\Core\Http\Response;
    use Projet\Core\Routing\Route;
    use Projet\Core\Routing\RouteCollection;
    use Projet\Core\Routing\RouteNotFound;
    use Projet\Core\Routing\RouteUrlMatcher;
    use Projet\Core\Routing\UrlMatcher;
    use Projet\Domain\Eleve;
    use Projet\Domain\Event;

    $request = Request::createFromGlobals();

    $loader = new ChainLoader([
        new JsonFileLoader([__DIR__ . '/src/Projet/Conf/routing.json'])
    ]);

    $config = new Configuration($loader);

    try {
        $controllerResolver = new ControllerResolver(new RouteUrlMatcher($config->getRoutes()));
        $callableAction = $controllerResolver->resolve($request);
        $response = call_user_func($callableAction, $request);
    } catch (RouteNotFound $e) {
        $response = new Response('Page not found', 404);
    } catch (Throwable $e) {
        $response = new Response(sprintf('<p>Error: %s</p>', $e->getMessage()), 500);
    }

    $response->send();