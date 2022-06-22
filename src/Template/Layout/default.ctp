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

$cakeDescription = 'Aksafund';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>: <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('styles.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

    <!-------------------------------------------------------------------------------------------------->
    <!---------------------------------- Inclusion de librairies -------------------------------------->
    <!-------------------------------------------------------------------------------------------------->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/css/mdb.min.css" rel="stylesheet">
    <!-- Slick -->
    <?= $this->Html->css('slick/slick.css') ?>
    <?= $this->Html->css('slick/slick-theme.css') ?>
    <link rel="stylesheet" href="https://paytech.sn/cdn/paytech.min.css">
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
    <?= $this->Element('Nav/nav-horizontal'); ?>
    <div class="container contenu card p-0">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
    <footer>
        <?= $this->Element('Nav/footer'); ?>
    </footer>
    <!-------------------------------------------------------------------------------------------------->
    <!---------------------------------- Inclusion de librairies -------------------------------------->
    <!-------------------------------------------------------------------------------------------------->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5z3yow8LqTpw3WlqBmWpvYYPl1i3mtLM&libraries=places&callback=initMap2"></script>
    <?= $this->fetch('script'); ?>
    <?= $this->Html->script('admin/vendor/sb-admin-2.min.js');?>
    <?= $this->fetch('script_bottom'); ?>
    <?= $this->Html->script('slick/slick.min.js') ?>
    <script src="https://paytech.sn/cdn/paytech.min.js"></script>

    <script>
        $(document).ready(function(){
            //made by vipul mirajkar thevipulm.appspot.com
            var TxtType = function(el, toRotate, period) {
                this.toRotate = toRotate;
                this.el = el;
                this.loopNum = 0;
                this.period = parseInt(period, 10) || 2000;
                this.txt = '';
                this.tick();
                this.isDeleting = false;
            };

            TxtType.prototype.tick = function() {
            var i = this.loopNum % this.toRotate.length;
            var fullTxt = this.toRotate[i];

            if (this.isDeleting) {
            this.txt = fullTxt.substring(0, this.txt.length - 1);
            } else {
            this.txt = fullTxt.substring(0, this.txt.length + 1);
            }

            this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

            var that = this;
            var delta = 200 - Math.random() * 100;

            if (this.isDeleting) { delta /= 2; }

            if (!this.isDeleting && this.txt === fullTxt) {
            delta = this.period;
            this.isDeleting = true;
            } else if (this.isDeleting && this.txt === '') {
            this.isDeleting = false;
            this.loopNum++;
            delta = 500;
            }

            setTimeout(function() {
            that.tick();
            }, delta);
        };

        window.onload = function() {
            var elements = document.getElementsByClassName('typewrite');
            for (var i=0; i<elements.length; i++) {
                var toRotate = elements[i].getAttribute('data-type');
                var period = elements[i].getAttribute('data-period');
                if (toRotate) {
                new TxtType(elements[i], JSON.parse(toRotate), period);
                }
            }
            // INJECT CSS
            var css = document.createElement("style");
            css.type = "text/css";
            css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
            document.body.appendChild(css);
        };
        // scroll menu top
        console.log( "ready!" );
        $(window).scroll(function (event) {
            var scroll = $(window).scrollTop();
            if( scroll > 100){
                $('.header_top_bottom').addClass('header_fixed')
            }
            else{
                $('.header_top_bottom').removeClass('header_fixed')
            }

        });
        // end menu scroll
        $('.slick-slider1').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 3,
            adaptiveHeight: false,
            arrows: false,
            // prevArrow: '<button class="slick-arrow slick-prev slick-prev1"></button>',
            // nextArrow: '<button class="slick-arrow slick-next slick-next1"></button>',
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
                    slidesToShow: 3,
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
            speed: 300,
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
