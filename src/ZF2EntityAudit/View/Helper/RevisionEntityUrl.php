<?php

namespace ZF2EntityAudit\View\Helper;

use Zend\View\Helper\AbstractHelper
    , Doctrine\ORM\EntityManager
    , Zend\ServiceManager\ServiceLocatorAwareInterface
    , Zend\ServiceManager\ServiceLocatorInterface
    , Zend\View\Model\ViewModel
    , DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrineAdapter
    , Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator
    , Zend\Paginator\Paginator
    , ZF2EntityAudit\Entity\AbstractAudit
    ;

// Return the url to the revision entity detail page (entity history)
final class RevisionEntityUrl extends AbstractHelper implements ServiceLocatorAwareInterface
{
    private $serviceLocator;

    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }

    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
        return $this;
    }

    public function __invoke($entity) {
        $auditModuleOptions = $this->getServiceLocator()->getServiceLocator()->get('auditModuleOptions');

        $auditedEntities = $auditModuleOptions->getAuditedEntityClasses();

        return ($entityName) ? $auditedEntities[$entityName]: $auditedEntities;
    }
}
