<?php

namespace App\Controller\Admin;

use App\Entity\Livres;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class LivresCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Livres::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
