<?php

namespace App\Controller\Admin;

use App\Entity\ExhaustState;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ExhaustStateCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ExhaustState::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('slug', 'Nom'),
        ];
    }

}
