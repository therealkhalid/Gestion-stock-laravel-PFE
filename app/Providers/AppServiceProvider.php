<?php

namespace App\Providers;


use App\AdminLTE\AccountMenuBuildingEvent;
use App\Models\Handbook;
use Illuminate\Events\Dispatcher;
use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
    

     * Bootstrap any application services.
     *
     * @param Dispatcher $events
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        app('view')->addNamespace('adminlte', resource_path("views/vendor/adminlte"));
        app('translator')->addNamespace("site", resource_path("lang/vendor/site"));

        // Account menu
        $events->listen(AccountMenuBuildingEvent::class, function (AccountMenuBuildingEvent $event) {
            foreach (config("app.account.navigation") as $item) {
                $event->menu->add($item);
            }
        });

        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            if(auth()->user()->role=='admin'){
            $event->menu->add(
                    ['header' => 'account_settings'],
                 [
                     'text' => 'profile',
                     'url'  => '/admins',
                     'icon' => 'fas fa-fw fa-user',
                 ],
                 [
                     'text' => "Home",
                         'url'  => 'admin/home',
                       'icon' => 'fas fa-fw fa-home',
                ],
                [
                         'text' => 'Ajouter Utilisateur',
                         'url'  => route('admins.create'),
                         'icon' => 'fas fa-fw fa-user-plus',
                    ],
                
                [
                'text'    => 'La liste des utilisateurs',
                    'icon'    => 'fas fa-fw fa-arrow-alt-circle-right',
                'submenu' => [
                    [
                        'text'    => 'La liste des Clients',
                        'url'     =>'/client',
                        'icon'    => 'fas fa-fw fa-list',
                    ],
                    [
                        'text'    => 'La liste des Fournisseurs',
                        'url'     =>'/fournisseures',
                        'icon'    => 'fas fa-fw fa-list',
                    ],
                    [
                        'text'    => 'La liste des Livreurs',
                        'url'     =>'/livreurs',
                        'icon'    => 'fas fa-fw fa-list',
                    ],
                ],
            ],
            [
                     'text' => 'Gérer les Commandes',
                     'icon' => 'fas fa-shopping-cart',
                     'submenu' => [
                        [
                            'text'    => 'Historique / commandes',
                            'url'     =>'/commandes',
                            'icon'    => 'fas fa-fw fa-list ms-5',
                        ],
                        [
                            'text'    => 'La liste des Commandes',
                            'url'     =>'/commandes/show',
                            'icon'    => 'fas fa-fw fa-list',
                            // 'icon'    => 'fas fa-solid fa-box-dollar',
                        ],
                     ]
            ],
                [
                    'text'    => 'Gérer les Paiments',
                        'icon'    => 'fas fa-fw fa-money-check',
                    'submenu' => [
                        [
                            'text'    => 'La liste des Paiments',
                            'url'     =>'/paiement',
                            'icon'    => 'fas fa-fw fa-list',
                        ],
                        [
                            'text'    => 'Ajouter un Paiment',
                            'url'     =>'/paiement/create',
                            'icon'    => 'fas  fa-car',
                            // 'icon'    => 'fas fa-solid fa-box-dollar',
                        ],
                        
                    ],
                ],
                [
                    'text'    => 'Gérer les Livraison',
                        'icon'    => 'fas fa-fw fa-truck',
                    'submenu' => [
                        [
                            'text'    => 'La liste des livraisons',
                            'url'     =>'/livraison',
                            'icon'    => 'fas fa-fw fa-list',
                        ],
                        [
                            'text'    => 'Historique des Livraisons',
                            'url'     =>'/livraison/show',
                            'icon'    => 'fas fa-fw fa-list',
                        ],
                        [
                            'text'    => 'Ajouter une livraison',
                            'url'     =>'/livraison/create',
                            //'icon'    => 'fas fa-fw fa-list',
                            'icon'    => 'fas fa-plus',
                        ],
                    ],
                ],
                [
                    'text' => 'Gérer Les Réclamations',
                    'url'  => '/claim',
                    'icon' => 'fas fa-comment',
                ],
                [
                    'text'    => 'Gérer Les Catalogues',
                    'url'     =>'catalog',
                    'icon'    => 'fas fa-archive',
                ],
        );
        }else if(auth()->user()->role=='client'){
            $event->menu->add(
                ['header' => 'Navigation Principale'],
                [
                    'text' => 'profile',
                    'url'  => '/client/pro',
                    'icon' => 'fas fa-fw fa-user',
                ],
             [
                 'text' => "Tableau de bord",
                     'url'  => 'client/home',
                   'icon' => 'fas fa-fw fa-home',
            ],
            // [
            //     'text' => 'Gérer Les Commandes',
            //     'icon'  => 'fas fa-glyphicon',
            //     'submenu' => [
                [
                    'text'    => 'La liste des Commandes',
                    'url'     =>'/client/commande/show',
                    'icon' => 'fas fa-list',
                ],
        //      ]
                    [
                        'text'    => 'Ajouter une Commande',
                        'url'     =>'/client/commande',
                        'icon' => 'fas fa-solid fa-cart-plus',
                    ],
            // ],
                // [
                //     'text' => 'Gérer Les Réclamations',
                //     'icon'  => 'fas fa-list',
                //     'submenu' => [
                        [
                            'text'    => 'Liste des Réclamation',
                            'url'     =>'/reclamation',
                            'icon' => 'fas fa-list',
                        ],
                        [
                            'text'    => 'Ajouter une Reclamation',
                            'url'     =>'/reclamation/create',
                            'icon' => 'fas fa-comment',
                        ],
                //      ]
                // ],
            
            );

        }else if(auth()->user()->role=='livreur'){
            $event->menu->add(
                ['header' => 'account_settings'],
             [
                 'text' => 'profile',
                 'url'  => '/livreur/profile',
                 'icon' => 'fas fa-fw fa-user',
             ],
             [
                 'text' => "Tableau de bord",
                     'url'  => 'livreur/home',
                   'icon' => 'fas fa-fw fa-home',
            ],
            [
                     'text' => 'La liste des Livraison',
                     'url'  => '/livraisons',
                     'icon' => 'fas fa-fw fa-list',
                ],
            [
                     'text' => "L'historique des Livraison",
                     'url'  => "/livraisons/".auth()->user()->id,
                     'icon' => 'fas fa-list',
                ],
            
            );

        }else if(auth()->user()->role=='fournisseur'){
            $event->menu->add(
                ['header' => 'account_settings'],
             [
                 'text' => 'profile',
                 'url'  => '/profile_fournisseur',
                 'icon' => 'fas fa-fw fa-user',
             ],
             [
                 'text' => "tableau de bord",
                     'url'  => 'fournisseur/home',
                   'icon' => 'fas fa-fw fa-home',
            ],
            // [
            //     'text'    => 'Gérer Catalogue',
            //         'icon'    => 'fas  fa-boxes',
            //     'submenu' => [
                [
                     'text' => 'Listes des Catalogues',
                     'url'  => '/catalogue',
                     'icon' => 'fas  fa-list',
                ],
                [
                     'text' => 'Ajouter un Catalogue',
                     'url'  => '/catalogue/create',
                     'icon' => 'fas fa-sharp fa-solid fa-folder-plus',
                ],
            //     ]
            // ]
            );

        }
        });
    }
}


