<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><?php echo $article->title;?></h3>
        </div>
        <div class="card-body">
            <h5 class="card-subtitle mb-2 text-muted">Povzetek:</h5>
            <p class="card-text"><?php echo $article->abstract;?></p>
            <p class="card-text"><?php echo $article->text; ?></p>
            <p class="card-text"><small class="text-muted">Objavil: <?php echo $article->user->username; ?>, <?php echo date_format(date_create($article->date), 'd. m. Y \ob H:i:s'); ?></small></p>
        </div>
        <div class="card-footer">
            <a href="/" class="btn btn-primary">Nazaj</a>
        </div>
    </div>
</div>