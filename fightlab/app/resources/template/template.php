<!DOCTYPE html>
<html lang="es">
<head>
    <?php
        require_once APP_DIR_TEMPLATE . 'includes/head.php';
    
        if(isset($this->scripts) && is_array($this->scripts)){
            foreach ($this-> scripts as $script){
                echo "<script defer src='" . APP_URL . $script . "'></script>";
            }
        } 

    ?>
</head>
<body class="d-flex flex-column min-vh-100 bg-dark text-white">
    <header>
        <?php
        require_once APP_DIR_TEMPLATE . 'includes/menu.php';
        ?>
    </header>

    <main class="container py-4 flex-grow-1">
        <?php
            require_once APP_DIR_VIEWS . $this->view;
        ?>
    </main>

    <footer class="bg-danger text-center text-white py-3">
        <?php
            require_once APP_DIR_TEMPLATE . 'includes/footer.php';
        ?>
    </footer>
</body>
</html>