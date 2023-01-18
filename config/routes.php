<?php

use Jonas\ListController\Controller\CategoryInsert;
use Jonas\ListController\Controller\CategoryItems;
use Jonas\ListController\Controller\DeleteCategory;
use Jonas\ListController\Controller\DeleteItem;
use Jonas\ListController\Controller\EditCategory;
use Jonas\ListController\Controller\EditItem;
use Jonas\ListController\Controller\FinishedItems;
use Jonas\ListController\Controller\FinishItem;
use Jonas\ListController\Controller\Home;
use Jonas\ListController\Controller\LoginForm;
use Jonas\ListController\Controller\LogOut;
use Jonas\ListController\Controller\NewItem;
use Jonas\ListController\Controller\RegisterForm;
use Jonas\ListController\Controller\RemoveFinish;
use Jonas\ListController\Controller\SignIn;
use Jonas\ListController\Controller\SignUp;

return [
    '/login' => LoginForm::class,
    '/process-login' => SignIn::class,
    '/register' => RegisterForm::class,
    '/process-register' => SignUp::class,
    '/logout' => LogOut::class,
    '/home' => Home::class,
    '/category-items' => CategoryItems::class,
    '/finished-items' => FinishedItems::class,
    '/new-category' => CategoryInsert::class,
    '/delete-category' => DeleteCategory::class,
    '/edit-category' => EditCategory::class,
    '/new-item' => NewItem::class,
    '/edit-item' => EditItem::class,
    '/delete-item' => DeleteItem::class,
    '/finish-item' => FinishItem::class,
    '/remove-finish' => RemoveFinish::class
];
