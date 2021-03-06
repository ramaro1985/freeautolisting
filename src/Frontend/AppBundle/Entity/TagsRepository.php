<?php

namespace Frontend\AppBundle\Entity;

use \DateTime;
use Doctrine\ORM\EntityRepository;

/**
 * TagsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TagsRepository extends EntityRepository
{
       public function filterTags($filtro){
        
       
        $searchtext = $filtro['searchtext'];   
           
        $qb = $this->createQueryBuilder('t');
        $qb->select('t');
        
        if(isset($searchtext) && $searchtext != '' ){
        $qb->andWhere('t.name like :searchtext');
        $qb->setParameter('searchtext', '%'.$searchtext.'%');
        }
        
    
    
        $qb->orderBy('t.name','ASC');
        $query = $qb->getQuery();
       
        try {
        return $query->getResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
        return null;
        }
        
        }
        
        
        
        
    
    
}
