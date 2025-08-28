<?php
include_once "conexao.php";
?>

<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editor de resgistros em PHP MySQL com frameworks Bootstrap5 e Trumbowyg </title>

    <link rel="stylesheet" href="dist/ui/trumbowyg.min.css">
    <link rel="stylesheet" href="dist/plugins/emoji/ui/trumbowyg.emoji.min.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="listar.php">Listar</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search"/>
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </nav>

    <main class="container d-flex flex-column pb-4">
    <!-- Content here -->
    <span class="d-block my-2 p-2 text-bg-secondary">Criar artigo</span>

        <?php
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if (!empty($dados['SendCadArtigo'])) {
            //var_dump($dados);
            $query_cad_artigo = "INSERT INTO artigos (titulo, conteudo) VALUES (:titulo, :conteudo)";
            $cad_artigo = $conn->prepare($query_cad_artigo);
            $cad_artigo->bindParam(':titulo', $dados['titulo']);
            $cad_artigo->bindParam(':conteudo', $dados['conteudo']);
            $cad_artigo->execute();

            if ($cad_artigo->rowCount()) {
                echo "<p style='color: green;'>Artigo cadastrado com sucesso!</p>";
            } else {
                echo "<p style='color: #f00;'>Erro: Artigo não cadastrado com sucesso!</p>";
            }
        }
        ?>

        <form method="POST" action="">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end py-2">
                <input type="submit" class="btn btn-primary rounded-0" value="Cadastrar" name="SendCadArtigo" />
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text  rounded-0" id="basic-addon1">Título</span>
                <input type="text" class="form-control  rounded-0" name="titulo" id="titulo" placeholder="Insira o título do artigo" aria-label="Título artigo" aria-describedby="basic-addon1">
            </div>  
            <textarea name="conteudo" id="trumbowyg-editor" rows="5" placeholder="Conteúdo"></textarea>

            
        </form>
    </main>

    <footer class="navbar fixed-bottom bg-body-tertiary d-block mt-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Footer Fixed bottom</a>
    </div>
    </footer>



    
    
  </body>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="dist/trumbowyg.min.js"></script>

    <script type="text/javascript" src="dist/langs/pt_br.min.js"></script>

    <script src="dist/plugins/emoji/trumbowyg.emoji.min.js"></script>

    <script src="dist/plugins/upload/trumbowyg.upload.min.js"></script>

<!-- Import dependency for Resizimg (tested with version 0.35). For a production setup, follow install instructions here: https://github.com/RickStrahl/jquery-resizable -->
<script src="//rawcdn.githack.com/RickStrahl/jquery-resizable/0.35/dist/jquery-resizable.min.js"></script>


<!-- Import all plugins you want AFTER importing jQuery and Trumbowyg -->
<script src="trumbowyg/dist/plugins/resizimg/trumbowyg.resizimg.min.js"></script>
    <script>
        $('#trumbowyg-editor').trumbowyg({
            lang: 'pt_br',
            btns: [
                ['viewHTML'],
                ['undo', 'redo'], // Only supported in Blink browsers
                ['formatting'],
                ['strong', 'em', 'del'],
                ['superscript', 'subscript'],
                ['link'],
                ['insertImage'],
                ['upload'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['horizontalRule'],
                ['removeformat'],
                ['fullscreen'],
                ['emoji']
            ],
            plugins: {
                // Add imagur parameters to upload plugin for demo purposes
                upload: {
                    serverPath: './upload.php',
                    fileFieldName: 'image',
                    headers: {
                        'Authorization': 'Client-ID xxxxxxxxxxxx'
                    },

                    resizimg: {
            minSize: 64,
            step: 16,
        },

                    urlPropertyName: 'file'
                }
            },
            autogrow: true
        });
    </script>

</html>

