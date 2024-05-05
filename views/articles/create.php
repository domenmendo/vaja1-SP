<div class="container">
    <h3>Objavi novico</h3>
    <form action="index.php?controller=articles&action=store" method="post">
        <div class="form-group">
            <label for="title">Naslov</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="content">Vsebina</label>
            <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Objavi</button>
    </form>
</div>