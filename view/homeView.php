<?php
$title = 'Yellow Resto';
?>

<?php ob_start(); ?>


<main class="main pt-4">

    <!--  CARTE + DETAILS  -->
	<section class="container">
        <div class="row">

            <!-- RESTAURANT LISTE -->
            <div id="detail-station" class="col-sm-6">
                <h4>Restaurants</h4>
                    <?php while ($restaurant = $restaurants->fetch()) { ?>
                    <div class="card" style="width: 18rem;">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="placeholder image">
                        <div class="card-body">
                            <p class="card-text"><?= $restaurant['restaurant_name'] ?></p>
                        </div>
                    </div>
                    <?php } $restaurants->closeCursor(); ?>
                    
            </div>

            <!-- MAP -->
            <div id="map" class="col-sm-6"> </div>
        
        </div>
    </section>

</main>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>