<?php

namespace App\Controller\Admin;

use App\Entity\Contest;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class ContestCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Contest::class;
    }

    public function configureActions(Actions $actions): Actions
    {

        if ($this->isGranted('ROLE_CLIENT')) {
            return $actions
                ->remove(Crud::PAGE_INDEX, Action::NEW)
                ->remove(Crud::PAGE_DETAIL, Action::EDIT)
                ->remove(Crud::PAGE_DETAIL, Action::DELETE)
                ->remove(Crud::PAGE_INDEX, Action::DELETE)
                ->remove(Crud::PAGE_INDEX, Action::EDIT)
                ;
        }
        else {
            return $actions;
        }
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),

            DateField::new('start_date', 'Date début'),
            DateField::new('end_date', 'Date fin'),
            AssociationField::new('id_infrastructure', 'Infrastructure'),
        ];
    }

}
