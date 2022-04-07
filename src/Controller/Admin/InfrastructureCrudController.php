<?php

namespace App\Controller\Admin;

use App\Entity\Infrastructure;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class InfrastructureCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Infrastructure::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('type', 'Type'),
            IntegerField::new('level', 'Niveau'),
            TextareaField::new('description', 'Description'),
            TextField::new('family', 'Famille'),
            IntegerField::new('price', 'Prix'),
            IntegerField::new('resources', 'Consommation de ressources'),
            IntegerField::new('capacityItems', "Capacité d'accueil d'items"),
            IntegerField::new('capacityHorse', "Capacité d'accueil de chevaux"),
            AssociationField::new('items', "Items"),
        ];
    }
}
