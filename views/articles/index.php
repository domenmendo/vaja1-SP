<div class="container">
    <h3>Seznam novic</h3>
    <?php
    foreach ($articles as $article){
        ?>
        <div class="card mb-3">
            <div class="card-body">
                <h4 class="card-title"><?php echo $article->title;?></h4>
                <p class="card-text"><?php echo $article->abstract;?></p>
                <p class="card-text"><small class="text-muted">Objavil: <?php echo $article->user->username; ?>, <?php echo date_format(date_create($article->date), 'd. m. Y \ob H:i:s'); ?></small></p>
                <a href="/articles/show?id=<?php echo $article->id;?>" class="btn btn-primary">Preberi več</a>
            </div>
        </div>
        <?php
    }
    ?>
</div>