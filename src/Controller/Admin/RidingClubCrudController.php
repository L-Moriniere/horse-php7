<?php

namespace App\Controller\Admin;

use App\Entity\RidingClub;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class RidingClubCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RidingClub::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            IntegerField::new('capacity', 'Capacité'),
            AssociationField::new('items', 'Items'),
            AssociationField::new('infrastructures', 'Infrastructures'),
            AssociationField::new('idUser', 'Utilisateur'),
        ];
    }
}
