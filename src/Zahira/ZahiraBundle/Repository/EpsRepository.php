<?php

namespace Zahira\ZahiraBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * EpsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EpsRepository extends EntityRepository
{
    /**
    * lista todas las eps que se encuentren e bases de datos
    */
    public function GetAllEps(){
        $em = $this->getEntityManager();
        $dql = 'SELECT '
                    .'eps.id, '
                    .'eps.codEps, '
                    .'eps.nameEps, '
                    .'eps.regimeEps '
                .'FROM zahiraBundle:Eps eps ';
        $query = $em->createQuery($dql);
        $result = $query->getResult();
        return $result;
    }
}
