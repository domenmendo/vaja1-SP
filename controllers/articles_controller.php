<?php
/*
    Controller za novice. Vključuje naslednje standardne akcije:
        index: izpiše vse novice
        show: izpiše posamezno novico
        
    TODO:
        list: izpiše novice prijavljenega uporabnika
        create: izpiše obrazec za vstavljanje novice
        store: vstavi novico v bazo
        edit: izpiše vmesnik za urejanje novice
        update: posodobi novico v bazi
        delete: izbriše novico iz baze
*/

class articles_controller
{
    public function index()
    {
        //s pomočjo statične metode modela, dobimo seznam vseh novic
        //$ads bo na voljo v pogledu za vse oglase index.php
        $articles = Article::all();

        //pogled bo oblikoval seznam vseh oglasov v html kodo
        require_once('views/articles/index.php');
    }

    public function show()
    {
        //preverimo, če je uporabnik podal informacijo, o oglasu, ki ga želi pogledati
        if (!isset($_GET['id'])) {
            return call('pages', 'error'); //če ne, kličemo akcijo napaka na kontrolerju stran
            //retun smo nastavil za to, da se izvajanje kode v tej akciji ne nadaljuje
        }
        //drugače najdemo oglas in ga prikažemo
        $article = Article::findById($_GET['id']);
        require_once('views/articles/show.php');
    }

    public function create(){
        // Show the form
        require_once('views/articles/create.php');
    }

    public function list() {
        //method in your Article model to get articles by user
        $articles = Article::find($_SESSION['USER_ID']);
        require_once('views/articles/list.php');
    }

    public function store() {
        // Check if title and content are set
        if (!isset($_POST['title']) || !isset($_POST['content'])) {
            // You can handle the error as you see fit, maybe set a flash message to inform the user
            header('Location: index.php?controller=articles&action=list');
            return;
        }
    
        // Trim the inputs to remove unnecessary white spaces
        $title = trim($_POST['title']);
        $content = trim($_POST['content']);
    
        // Check if title and content are not empty
        if (empty($title) || empty($content)) {
            // Handle the error, maybe set a flash message to inform the user
            header('Location: index.php?controller=articles&action=list');
            return;
        }

        $title = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
        $content = htmlspecialchars($content, ENT_QUOTES, 'UTF-8');

        // Create the article using the constructor
        $article = new Article($_SESSION['USER_ID'], $title, "ni povzetka", $content, date('Y-m-d H:i:s'), $_SESSION['USER_ID']);
    
        // Save the article in the database
        $article->store();
    
        header('Location: index.php?controller=articles&action=list');
    }

    public function edit(){
        // Check if the user is logged in
        if (!isset($_SESSION['USER_ID'])) {
            // Redirect to the login page
            header("Location: /users/login");
            exit();
        }
        // Fetch the article
        $article = Article::findById($_GET['id']);
        // Check if the article belongs to the logged-in user
        if ($article->user->id != $_SESSION['USER_ID']) {
            // Redirect to the error page
            header("Location: /pages/error");
            exit();
        }
        // Show the form
        require_once('views/articles/edit.php');
    }

    public function update() {
        if (!isset($_POST['id']) || !isset($_POST['title']) || !isset($_POST['content']) || !isset($_POST['abstract'])) {
            // Handle the error, maybe set a flash message to inform the user
            header('Location: index.php?controller=articles&action=list');
            return;
        }
    
        $id = trim($_POST['id']);
        $title = trim($_POST['title']);
        $content = trim($_POST['content']);
        $abstract = trim($_POST['abstract']);
    
        if (empty($id) || empty($title) || empty($content) || empty($abstract)) {
            // Handle the error, maybe set a flash message to inform the user
            header('Location: index.php?controller=articles&action=list');
            return;
        }
    
        $id = htmlspecialchars($id, ENT_QUOTES, 'UTF-8');
        $title = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
        $content = htmlspecialchars($content, ENT_QUOTES, 'UTF-8');
        $abstract = htmlspecialchars($abstract, ENT_QUOTES, 'UTF-8');
    
        Article::update($id, $title, $abstract, $content); // null for abstract because we don't have it in the form
        header('Location: index.php?controller=articles&action=list');
    }

    public function delete() {
        if (!isset($_GET['id'])) {
            return call('pages', 'error');
        }
        Article::delete($_GET['id']);
        header('Location: index.php?controller=articles&action=list');
    }
}