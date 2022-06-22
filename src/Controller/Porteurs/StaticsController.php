<?php

namespace App\Controller\Porteurs;

use App\Controller\Porteurs\AppController;

class StaticsController extends AppController
{

    public function sidebar()
    {
        $current_user = $this->Auth->user()[0];
        $sidebar = [
            "principals" =>
            [
                [
                    "name" => "Dashboard",
                    "fa" => "fa-tachometer-alt",
                    "controller" => "Dashboard",
                    "action" => "index"
                ]
            ],
            "secondaires" =>
            [
                [
                    "name" => "Mes campagnes",
                    "fa" => "fa-blog",
                    "header" => "Gestion des campagnes",
                    "refs" => ['campagnes'],
                    "items" => [
                        [
                            "name" => "Ajouter une campagne",
                            "controller" => "Campagnes",
                            "action" => "add"
                        ],
                        [
                            "name" => "Toutes les campagnes",
                            "controller" => "Campagnes",
                            "action" => "index"
                        ],

                    ]
                ],
                [
                    "name" => "Les Participations",
                    "fa" => "fa-check-circle",
                    "header" => "Participations",
                    "refs" => ['participations'],
                    "items" => [
                        [
                            "name" => "Toutes les participations",
                            "controller" => "Participations",
                            "action" => "index"
                        ],

                    ]
                ],
                /*[
                    "name" => "Les entreprises",
                    "fa" => "fa-building",
                    "header" => "Gestion des entreprises",
                    "refs" => ['entreprise','evaluation'],
                    "items" => [
                        [
                            "name" => "Les évaluations",
                            "controller" => "Evaluation",
                            "action" => "index"
                        ],
                        [
                            "name" => "Les entreprises",
                            "controller" => "Entreprise",
                            "action" => "index"
                        ],
                        [
                            "name" => "Les nomminés",
                            "controller" => "Nommines",
                            "action" => "index"
                        ],
                        [
                            "name" => "Ajouter entreprise",
                            "controller" => "Entreprise",
                            "action" => "add"
                        ]
                    ]

                ],-*/
                [
                    "name" => "Mon Profil",
                    "fa" => "fa-users",
                    "header" => "Mon Profil",
                    "refs" => ['users'],
                    "controller" => "Users",
                    "action" => "view/".$current_user->id.""

                ],
                // [
                //     "name" => "Les feed-Backs",
                //     "fa" => "fa-envelope-open-text",
                //     "header" => "Gestion des messages",
                //     "refs" => ['contact', 'newletter', 'projet'],
                //     "items" => [
                //         [
                //             "name" => "Les projets",
                //             "controller" => "Projet",
                //             "action" => "index"
                //         ],
                //         [
                //             "name" => "Les contacts",
                //             "controller" => "Contact",
                //             "action" => "index"
                //         ],
                //         [
                //             "name" => "Les newletters",
                //             "controller" => "Newletter",
                //             "action" => "index"
                //         ]
                //     ]

                // ]
            ]
        ];



        return $sidebar;
    }

    public function hashUrl($id) {
        $params = [
            'sh' => $this->token(80),
            'i' => $id,
            'hs' => $this->token(50)
        ];

        return $params;
    }

}
