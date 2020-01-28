<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 * Cache: Routes are cached to improve performance, check the RoutingMiddleware
 * constructor in your `src/Application.php` file to change this behavior.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

Router::prefix('admin', function (RouteBuilder $routes) {
    $routes->connect(
        '/dashboard',
        ['controller' => 'SystemicPages', 'action' => 'dashboard'],
        ['_name' => 'dashboard']
    );

    $routes->fallbacks(DashedRoute::class);
});

Router::scope('/', function (RouteBuilder $routes) {
    // Register scoped middleware for in scopes.
    $routes->registerMiddleware('csrf', new CsrfProtectionMiddleware([
        'httpOnly' => true
    ]));

    /**
     * Apply a middleware to the current route scope.
     * Requires middleware to be registered via `Application::routes()` with `registerMiddleware()`
     */
    $routes->applyMiddleware('csrf');

    /**
     * ...Begin plots
     */
    $routes
        ->connect('/plots/:number', ['controller' => 'Plots', 'action' => 'view'], ['_name' => 'plot_view'])
        ->setPass(['number']);
    /**
     * ...End events
     */

    /**
     * ...Begin events
     */
    $routes
        ->connect('/events/:id', ['controller' => 'Events', 'action' => 'view'], ['_name' => 'event_view'])
        ->setPass(['id']);
    /**
     * ...End events
     */


    /**
     * ...Begin users
     */
    $routes->connect('/login', ['controller' => 'Users', 'action' => 'login'], ['_name' => 'login']);
    $routes->connect('/logout', ['controller' => 'Users', 'action' => 'logout'], ['_name' => 'logout']);
    /**
     * ...End users
    */

    /**
     * ...Begin dynamic pages
     */
    $routes
        ->connect('/p/:slug', ['controller' => 'Pages', 'action' => 'view'], ['_name' => 'page_view'])
        ->setPass(['slug']);
    /**
     * ...End dynamic pages
    */


    /**
     * ...Begin systemic pages
     */
    $routes->connect('/', ['controller' => 'SystemicPages', 'action' => 'display'], ['_name' => 'home']);
    $routes
        ->connect('/sitemap', ['controller' => 'SystemicPages', 'action' => 'sitemap'], ['_name' => 'sitemap'])
        ->setExtensions(['xml']);
    $routes
        ->connect('/robots', ['controller' => 'SystemicPages', 'action' => 'robots'], ['_name' => 'robots'])
        ->setExtensions(['txt']);
    $routes->connect('/pages/*', ['controller' => 'SystemicPages', 'action' => 'display']);
    /**
     * ...End systemic pages
     */

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *
     * ```
     * $routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);
     * $routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);
     * ```
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks(DashedRoute::class);
});

/**
 * If you need a different set of middleware or none at all,
 * open new scope and define routes there.
 *
 * ```
 * Router::scope('/api', function (RouteBuilder $routes) {
 *     // No $routes->applyMiddleware() here.
 *     // Connect API actions here.
 * });
 * ```
 */
