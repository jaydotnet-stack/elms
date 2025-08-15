<!DOCTYPE html>
<html lang="en">


    <head>
        <?= $this->renderSection("meta") ?>
        <?= $this->include('partials/adminassets/meta')?>

        <?= $this->renderSection("globalcss") ?>
        <?= $this->include('partials/adminassets/globalcss')?>
    </head>
    
    <body>  

        <!-- wrapper -->
        <div class="wrapper">
            <?= $this->renderSection("wrapper") ?>
            <?= $this->include('partials/adminassets/wrapper')?>
        </div>
        <!-- wrapper end -->

	    <!--start switcher-->
        <div class="switcher-wrapper">
            <?= $this->include('partials/adminassets/switcher')?>
        </div>
	    <!--end switcher-->         

        <!-- js -->        
        <?= $this->renderSection("globaljs") ?>
        <?= $this->include('partials/adminassets/globaljs')?> 

        <?= $this->include('partials/adminassets/modaljs')?>        

    </body>
</html>