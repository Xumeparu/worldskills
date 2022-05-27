<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->title = 'Funny Comics Land';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent"></div>

    <div class="body-content">
        <div id="carouselExampleControls" class="carousel slide w-25" data-ride="carousel">
            <div class="carousel-inner">
                <?php $i=0; foreach ($products as $product): ?>
                    <?php if ($i==0) {$set_ = 'active'; } else {$set_ = ''; } ?>
                    <div class='carousel-item <?php echo $set_; ?>'>
                        <img src='uploads/<?php echo $product->picture; ?>' class='d-block w-100 image' alt="">
                        <h1><?php echo $product->title; ?></h1>
                    </div>
                <?php $i++; endforeach ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>

<script>
    let count = 0;

    function hover(el) {
        el.src = el.dataset.before;
    }

    function back(el) {
        el.src = el.dataset.after;
    }

</script>

