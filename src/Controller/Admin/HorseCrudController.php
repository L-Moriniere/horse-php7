<?php

namespace App\Controller\Admin;

use App\Entity\Horse;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class HorseCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Horse::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name', 'Nom'),
            TextField::new('race', 'Race'),
            TextareaField::new('description', 'Description'),
            IntegerField::new('speed', 'Vitesse')->hideOnIndex(),
            IntegerField::new('stamina', 'Endurance')->hideOnIndex(),
            IntegerField::new('jump_height', 'Détente')->hideOnIndex(),
            IntegerField::new('strength', 'Force')->hideOnIndex(),
            IntegerField::new('sociability', 'Sociabilité')->hideOnIndex(),
            IntegerField::new('intelligence', 'Intelligence')->hideOnIndex(),
            IntegerField::new('temperament', 'Tempérament')->hideOnIndex(),
            IntegerField::new('experience', 'Expérience')->hideOnIndex(),
            IntegerField::new('level', 'Niveau'),
            IntegerField::new('general_stat', 'Statistique générale')->hideOnIndex(),
            AssociationField::new('id_exhaust_state', 'Etat de fatigue')->hideOnIndex(),
            AssociationField::new('id_health_state', 'Etat de santé')->hideOnIndex(),
            AssociationField::new('id_stress_state', 'Etat de stress')->hideOnIndex(),
            AssociationField::new('id_hunger_state', 'Etat de faim')->hideOnIndex(),
            AssociationField::new('id_clean_state', 'Etat de propreté')->hideOnIndex(),
            AssociationField::new('id_user', 'Utilisateur')->hideOnIndex(),
        ];
    }

}
