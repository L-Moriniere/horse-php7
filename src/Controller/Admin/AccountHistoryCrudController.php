<?php

namespace App\Controller\Admin;

use App\Entity\AccountHistory;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AccountHistoryCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return AccountHistory::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
         yield Field::new('date', 'Date');
         yield Field::new('operation', 'Operation');
         yield AssociationField::new('idBankAccount', 'Compte en banque');

    }

}
