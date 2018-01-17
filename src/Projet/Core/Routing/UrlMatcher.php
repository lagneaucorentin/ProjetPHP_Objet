<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Projet\Core\Routing;

use Projet\Core\Http\Request;

interface UrlMatcher
{
    public function match(Request $request);
}
