<?php

namespace App\Controller\Admin;

use App\Entity\Review;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ReviewCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Review::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('emailUser'),
            AssociationField::new('NameArticle'),
            TextField::new('text')
        ];
    }

}
