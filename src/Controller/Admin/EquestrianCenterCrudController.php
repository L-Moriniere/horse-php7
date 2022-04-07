<?php

namespace App\Controller\Admin;

use App\Entity\EquestrianCenter;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class EquestrianCenterCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EquestrianCenter::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),

            IntegerField::new('capacity', 'Capacité'),
            AssociationField::new('idUser', 'Utilisateur'),
            AssociationField::new('infrastructures', 'Infrastructure'),
            AssociationField::new('task', 'Tâches'),
        ];
    }
}
