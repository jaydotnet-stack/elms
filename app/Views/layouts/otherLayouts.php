<!DOCTYPE html>
<html lang="en">

    <head>
        <?= $this->renderSection("meta") ?>
        <?= $this->include('partials/assets/meta')?>

        <?= $this->renderSection("globalcss") ?>
        <?= $this->include('partials/assets/globalcss')?>

        <?= $this->include('partials/assets/jquery')?>
    </head>
    
    <body>
        <!-- start preloader -->
        <?= $this->include('partials/assets/preloader')?>
        <!-- start preloader -->

        <!-- Scroll To Top Start-->
        <?= $this->include('partials/assets/scrolltotop')?>
        <!-- Scroll To Top End -->

        <!-- Start Custom Cursor -->
        <?= $this->include('partials/assets/customcursor')?>
        <!-- Start Custom Cursor end -->

        <!-- header-section start -->
        <?= $this->renderSection("header") ?>
        <?= $this->include('partials/assets/otherheader')?>
        <!-- header-section end -->
        
        <!-- main-section start -->
        <?= $this->renderSection("content") ?>
        <!-- main-section end -->

        <!-- footer Start -->
        <?= $this->renderSection("footer") ?>
        <?= $this->include('partials/assets/otherfooter')?>
        <!-- footer end -->  

        <!-- modal Start -->
        <?= $this->include('partials/assets/modal')?>
        <!-- modal end -->          
          
        <!-- ==== js dependencies start ==== -->  
        <?= $this->renderSection("globaljs") ?>
        <?= $this->include('partials/assets/globaljs')?>        

    </body>
</html>