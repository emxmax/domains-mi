<?php
    if($diseno==1){
        print '<header id="header-banner">';
        if($bannerStyle==1){
            /*print '<article id="bannerImg"></article>';*/
            print '<a href="./"><img src="imagenes/banner2.png" alt="banner-mineriasegura" width="100%"/></a>';
        }else{
            print '<article id="bannerSlider"></article>';
        }
        print '</header>';
        if($menu){
            include('menu.php');
        }if($slider){
            include('slider.php');
        }
    }else{
        if($menu){
            include('menu.php');
        }
        print '<header id="header-banner">';
        if($bannerStyle==1){
            print '<article id="bannerImg"></article>';
        }else{
            print '<article id="bannerSlider"></article>';
        }
        print '</header>';
        if($slider){
            include('slider.php');
        }
    }
?>