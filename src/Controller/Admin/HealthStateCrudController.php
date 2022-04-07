<?php

namespace App\Controller\Admin;

use App\Entity\HealthState;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class HealthStateCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return HealthState::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('slug', 'nom'),
        ];
    }
}
