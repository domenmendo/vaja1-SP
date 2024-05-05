<div class="container">
    <h3>Edit Article</h3>
    <form action="index.php?controller=articles&action=update" method="post">
        <input type="hidden" name="id" value="<?php echo $article->id; ?>">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $article->title; ?>" required>
        </div>
        <div class="form-group">
            <label for="abstract">Abstract</label>
            <textarea class="form-control" id="abstract" name="abstract" rows="3" required><?php echo $article->abstract; ?></textarea>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="3" required><?php echo $article->text; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>