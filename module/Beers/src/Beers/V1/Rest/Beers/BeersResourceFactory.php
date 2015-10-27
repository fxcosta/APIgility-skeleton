<?php
namespace Beers\V1\Rest\Beers;

class BeersResourceFactory
{
    public function __invoke($services)
    {
        $db = $services->get('beersDB');
        return new BeersResource($db);
    }
}
