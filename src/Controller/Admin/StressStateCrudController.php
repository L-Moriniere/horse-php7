<?php

namespace App\Controller\Admin;

use App\Entity\StressState;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class StressStateCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return StressState::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('slug', 'Nom'),
        ];
    }
}
