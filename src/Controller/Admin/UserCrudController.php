<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('username', 'Pseudo'),
            EmailField::new('mail', 'E-mail'),
            TextField::new('password', 'Mot de passe')->hideOnIndex(),
            TextField::new('firstName', 'Prénom'),
            TextField::new('lastName', 'Nom'),
            TextField::new('gender', 'Genre'),
            DateField::new('birthDate', 'Anniversaire'),
            TextField::new('phoneNumber', 'Numéro de téléphone')->hideOnIndex(),
            TextField::new('adress', 'Adresse postale')->hideOnIndex(),
            TextareaField::new('description', 'Description')->hideOnIndex(),
            TextField::new('website', 'Site internet')->hideOnIndex(),
            AssociationField::new('idBankAccount', 'Compte en banque')->hideOnIndex(),
            AssociationField::new('idEquestrianCenter', 'Centre Equestre')->hideOnIndex(),
            AssociationField::new('ridingClub', 'Club hippique')->hideOnIndex(),
        ];
    }
}
