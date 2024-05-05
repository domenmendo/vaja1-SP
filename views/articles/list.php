<div class="container">
    <h3>Your Articles</h3>
    <?php
    foreach ($articles as $article){
        ?>
        <div class="card mb-3">
            <div class="card-body">
                <h4 class="card-title"><?php echo $article->title;?></h4>
                <p class="card-text"><?php echo $article->text;?></p>
                <p class="card-text"><small class="text-muted">Published: <?php echo $article->date ? date_format(date_create($article->date), 'd. m. Y \ob H:i:s') : 'N/A'; ?></small></p>
                <a href="index.php?controller=articles&action=show&id=<?php echo $article->id;?>" class="btn btn-primary">Read More</a>
                <a href="index.php?controller=articles&action=edit&id=<?php echo $article->id;?>" class="btn btn-warning">Edit</a>
                <a href="index.php?controller=articles&action=delete&id=<?php echo $article->id;?>" class="btn btn-danger">Delete</a>
            </div>
        </div>
        <?php
    }
    ?>
    <a href="index.php?controller=articles&action=create" class="btn btn-success">Create New Article</a>
</div>