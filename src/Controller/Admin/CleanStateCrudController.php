<?php

namespace App\Controller\Admin;

use App\Entity\CleanState;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CleanStateCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CleanState::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),

            TextField::new('slug', 'nom'),
        ];
    }
}
