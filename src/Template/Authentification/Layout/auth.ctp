<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Dashboard';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('styles.css') ?>
    <?= $this->Html->css('admin-styles.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

    <!---------------------------------- Inclusion de librairies -------------------------------------->
    <!-------------------------------------------------------------------------------------------------->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link href="">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/css/mdb.min.css" rel="stylesheet">
    <!-- Slick -->
    <?= $this->Html->css('slick/slick.css') ?>
    <?= $this->Html->css('slick/slick-theme.css') ?>


    <!-------------------------------------------------------------------------------------------------->
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Datatable Sources JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/js/mdb.min.js"></script>

    <!-------------------------------------------------------------------------------------------------->
    <!-------------------------------------------------------------------------------------------------->
    <!-------------------------------------------------------------------------------------------------->

    <?= $this->fetch('script') ?>
</head>
<body>
    <div class="container-fluid contenu-cnx p-0">
        <div class="col-md-12">
            <div class="row">
                    <?= $this->fetch('content') ?>
            </div>
        </div>
    </div>
    <!-------------------------------------------------------------------------------------------------->
    <!---------------------------------- Inclusion de librairies -------------------------------------->
    <!-------------------------------------------------------------------------------------------------->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5z3yow8LqTpw3WlqBmWpvYYPl1i3mtLM&libraries=places&callback=initMap2"></script>
    <?= $this->Html->script('header-scroll') ?>
    <?= $this->Html->script('slick/slick.min.js') ?>
    <script>
        $(document).ready(function(){
            $('#datatable').DataTable({
                responsive: true,
                scrollX: 300,
                // scrollY: 500,
                "destroy": true,

                "language": {
                        "lengthMenu": "Afficher _MENU_ par page",
                        "zeroRecords": "Pas d'enregistrement trouvé",
                        "info": "Page _PAGE_ sur _PAGES_",
                        "infoEmpty": "Pas d'enregistrement disponible",
                        "infoFiltered": "(filtrés sur _MAX_ enregistrements)",
                        "search":         "Recherche",
                        "scrollX": true,
                        "paginate": {
                            "first":      "<<",
                            "last":       ">>",
                            "next":       ">",
                            "previous":   "<"
                        }
                    }
            });
            $('.slick-slider1').slick({
                dots: true,
                infinite: true,
                speed: 300,
                slidesToShow: 3,
                adaptiveHeight: false,
                arrows: true,
                prevArrow: '<button class="slick-arrow slick-prev slick-prev1"></button>',
                nextArrow: '<button class="slick-arrow slick-next slick-next1"></button>',
                responsive: [
                    {
                    breakpoint: 1040,
                    settings: {
                        slidesToShow: 1,
                        infinite: true
                        }
                    },
                    {
                    breakpoint: 1040,
                    settings: {
                        slidesToShow: 2,
                        infinite: true
                        }
                    },
                    {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 1,
                        infinite: true
                        }
                    }

                ]
            });
            $('.slick-slider2').slick({
                dots: true,
                infinite: true,
                speed: 100,
                slidesToShow: 1,
                adaptiveHeight: true,
                arrows: true,
                autoplay: true,
                prevArrow: '<button class="slick-arrow slick-prev slick-prev2"></button>',
                nextArrow: '<button class="slick-arrow slick-next slick-next2"></button>',
                responsive: [
                    {
                    breakpoint: 1040,
                    settings: {
                        slidesToShow: 1,
                        infinite: true
                        }
                    },
                    {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 1,
                        infinite: true
                        }
                    }

                ]
            });
            $('.slick-slider3').slick({
                dots: false,
                rows: 1,
                infinite: true,
                speed: 300,
                slidesToShow: 1,
                adaptiveHeight: false,
                arrows: true,
                prevArrow: '<button class="slick-arrow slick-prev slick-prev3"></button>',
                nextArrow: '<button class="slick-arrow slick-next slick-next3"></button>'
            });

            $('.slick-view-article').slick({
                dots: false,
                rows: 1,
                infinite: true,
                speed: 300,
                autoplay: true,
                slidesToShow: 1,
                adaptiveHeight: true,
                arrows: false
            });
        });
    </script>
</body>
</html>
