<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\presentation\routing;

use Exception;
use closure;

class Router {

    protected $routes = []; // stores routes

    /*
    * add routes to the $routes
    */
    public function addRoute(string $method, string $url, closure $target) { 
        $this->routes[$method][$url] = $target;
    }

    public function matchRoute() {

        $method = $_SERVER['REQUEST_METHOD'];
        $url = $_SERVER['REQUEST_URI'];
        $url_final = str_replace('/contabilidad0/index.php','',$url);

        if (isset($this->routes[$method])) {

            foreach ($this->routes[$method] as $routeUrl => $target) {

                // Use named subpatterns in the regular expression pattern to capture each parameter value separately
                $pattern = preg_replace('/\/:([^\/]+)/', '/(?P<$1>[^/]+)', $routeUrl);
                
                //echo($url.'<br>');
                //echo($url_final.'<br>');
                //echo($routeUrl.'<br>');                
                //echo($pattern.'<br>');

                if (preg_match('#^' . $pattern . '$#', $url_final, $matches)) {
                    // Pass the captured parameter values as named arguments to the target function
                    $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY); // Only keep named subpattern matches
                    
                    call_user_func_array($target, $params);

                    return;
                }
            }
        }

        throw new Exception('Route not found');
    }

    public function matchRoute0() {

        $method = $_SERVER['REQUEST_METHOD'];
        $url = $_SERVER['REQUEST_URI'];
        $url_final = str_replace('/contabilidad0/index.php','',$url);

        if (isset($this->routes[$method])) {

            foreach ($this->routes[$method] as $routeUrl => $target) {
                //echo($url.'<br>');
                //echo($url_final.'<br>');
                //echo($routeUrl.'<br>');                

                if ($routeUrl === $url_final) {
                    call_user_func($target);
                }
            }
        }

        throw new Exception('Route not found');
    }
}
?>