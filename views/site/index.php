<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <?php
                foreach ($applications as $application) {
                    echo '
                        <div class="col-lg-3">
                        <h2>'.$application->title.'</h2>
                        <p>'.$application->description.'</p>
                        <p>'.$application->timestamp.'</p>
                        <img class="img-fluid" src="uploads/'.$application->pictureApplication.'" alt=""
                        data-before="uploads/'.$application->pictureApplication.'"
                        data-after="uploads/'.$application->pictureDesign.'"
                        onmouseover="hover(this)" onmouseout="back(this)">
                        </div>
                    ';
                }
            ?>
        </div>

    </div>
</div>

<script>
    function hover(el) {
        el.src = el.dataset.before;
    }

    function back(el) {
        el.src = el.dataset.after;
    }
</script>
