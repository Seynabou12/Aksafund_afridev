<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

class StaticsController extends AppController
{
    
    public function sidebar()
    {

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
                    "name" => "Les campagnes",
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
                        // [
                        //     "name" => "Ajouter une participation",
                        //     "controller" => "Participations",
                        //     "action" => "add"
                        // ],
                        [
                            "name" => "Toutes les participations",
                            "controller" => "Participations",
                            "action" => "index"
                        ],

                    ]
                ],
                [
                    "name" => "Les Catégories",
                    "fa" => "fa-th",
                    "header" => "Gestion des catégories",
                    "refs" => ['categorys','typescategorys'],
                    "items" => [
                        [
                            "name" => "Les catégories",
                            "controller" => "Categorys",
                            "action" => "index"
                        ],
                        [
                            "name" => "Ajouter une catégorie",
                            "controller" => "Categorys",
                            "action" => "add"
                        ]
                    ]

                ],
                [
                    "name" => "Les Types Catégories",
                    "fa" => "fa-industry",
                    "header" => "Gestion des types",
                    "refs" => ['secteur'],
                    "items" => [
                        [
                            "name" => "Les Types",
                            "controller" => "Typecategorys",
                            "action" => "index"
                        ],
                        [
                            "name" => "Ajouter un Type",
                            "controller" => "Typecategorys",
                            "action" => "add"
                        ]
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
                // [
                //     "name" => "Les participants",
                //     "fa" => "fa-user-tie",
                //     "header" => "Gestion des particpants",
                //     "refs" => ['Participants'],
                //     "items" => [
                //         [
                //             "name" => "Les participants",
                //             "controller" => "Participants",
                //             "action" => "index"
                //         ],
                //         [
                //             "name" => "Ajouter participant",
                //             "controller" => "Participants",
                //             "action" => "add"
                //         ]
                //     ]

                // ],
                [
                    "name" => "Les utilisateurs",
                    "fa" => "fa-users",
                    "header" => "Gestion des utilisateurs",
                    "refs" => ['users'],
                    "items" => [
                        [
                            "name" => "Les utilisateurs",
                            "controller" => "Users",
                            "action" => "index"
                        ],
                        [
                            "name" => "Ajouter un utilisateur",
                            "controller" => "Users",
                            "action" => "add"
                        ]
                    ]
                ],
                    // Les themes
                    [
                        "name" => "Les Thémes",
                        "fa" => "fa-th",
                        "header" => "Gestion des thémes",
                        "refs" => ['themes'],
                        "items" => [
                            [
                                "name" => "Les thémes",
                                "controller" => "Themes",
                                "action" => "index"
                            ],
                            [
                                "name" => "Ajouter un theme",
                                "controller" => "Themes",
                                "action" => "add"
                            ]
                        ]
    
                    ],
                    // Les parametres généraux de la plateforme
                    [
                        "name" => "Les Parametres",
                        "fa" => "fa-th",
                        "header" => "Gestion des Parametres",
                        "refs" => ['parametres'],
                        "items" => [
                            [
                                "name" => "Les parametres",
                                "controller" => "Parametres",
                                "action" => "index"
                            ],
                            [
                                "name" => "Ajouter un parametres",
                                "controller" => "Parametres",
                                "action" => "add"
                            ]
                        ]
    
                    ],

                     // Les sections de la plateforme
                     [
                        "name" => "Les Sections",
                        "fa" => "fa-industry",
                        "header" => "Gestion des Sections",
                        "refs" => ['sections', 'themes', 'sliders', 'images'],
                        "items" => [
                            [
                                "name" => "Les sections",
                                "controller" => "Sections",
                                "action" => "index"
                            ],
                            [
                                "name" => "Ajouter une section",
                                "controller" => "Sections",
                                "action" => "add"
                            ]
                        ]
    
                    ],

                     // Les sliders de la plateforme
                     [
                        "name" => "Les Sliders",
                        "fa" => "fa-th",
                        "header" => "Gestion des Sliders",
                        "refs" => ['sliders'],
                        "items" => [
                            [
                                "name" => "Les sliders",
                                "controller" => "Sliders",
                                "action" => "index"
                            ],
                            [
                                "name" => "Ajouter un slider",
                                "controller" => "Sliders",
                                "action" => "add"
                            ]
                        ]
    
                    ],

                    // gestion des Images
                    [
                        "name" => "Les Images",
                        "fa" => "fa-industry",
                        "header" => "Gestion des Images",
                        "refs" => ['images'],
                        "items" => [
                            [
                                "name" => "Les Images",
                                "controller" => "Images",
                                "action" => "index"
                            ],
                            [
                                "name" => "Ajouter une image",
                                "controller" => "Images",
                                "action" => "add"
                            ]
                        ]
    
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
                ],

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
