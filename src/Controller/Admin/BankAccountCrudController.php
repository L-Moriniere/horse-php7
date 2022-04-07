<?php

namespace App\Controller\Admin;

use App\Entity\BankAccount;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class BankAccountCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return BankAccount::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),

            IntegerField::new('amount', 'Montant'),
            AssociationField::new('idUser', 'Utilisateur'),
        ];
    }

}
