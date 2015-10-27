<?php
namespace SuicideGirl\V1\Rest\SuicideGirl;

class SuicideGirlResourceFactory
{
    public function __invoke($services)
    {
        return new SuicideGirlResource($services->get('Doctrine\ORM\EntityManager'));
    }
}
