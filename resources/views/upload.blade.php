<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Parser</title>

    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>

    <div class="content">
        <div class="title">
            O PDF foi carregado com sucesso! 
            <a href="#anchor"><i class='fas fa-arrow-alt-circle-down' style='font-size:48px;color:#4CAF50'></i></a>
        </div>
    </div>
    <?php
    // Include Composer autoloader if not already done.
    include base_path() . '/vendor/autoload.php';

    // Parse pdf file and build necessary objects.
    $parser = new \Smalot\PdfParser\Parser();
    $link = base_path() . "/storage/app/$path";
    $pdf    = $parser->parseFile("$link");

    // Retrieve all details from the pdf file.
    $details  = $pdf->getDetails();


    echo "<form action='/add' method='post' id='pdfform'>
        <input type='hidden' name='_token' value=".csrf_token().">
        <fieldset>
            <legend style='color:#4CAF50'>METADATA</legend>
            <div>
                <div>
                    <table>
                        <tr>
                            <td style='font-weight: bold'>Nome:</td>
                            <td><input type='text' name='ficheiro' value=".$path."></td>
                        </tr>
                        <tr>
                            <td style='font-weight: bold'>Criador:</td>
                            <td><input type='text' name='criador' value=".$details['Producer']." ></td>
                        </tr>
                        <tr>
                            <td style='font-weight: bold'>Data de criação:</td>
                            <td><input type='text' name='data' value=".$details['CreationDate']." ></td>
                        </tr>
                        <tr>
                            <td style='font-weight: bold'>Páginas:</td>
                            <td><input type='text' name='paginas' value=".$details['Pages']." ></td>
                        </tr>
                        <tr>
                            <td colspan=2>
                                <input type='submit' value='Adicionar' />
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </fieldset>";

    $space= '<p></p>';
    echo $space;


    // Retrieve all pages from the pdf file.
    $pages  = $pdf->getPages();
    $alltext   = $pdf->getText();
    $count=1;

    // Loop over each page to extract text.
    foreach ($pages as $p) {
        echo    '<fieldset style="margin-bottom: 20px">
                    <legend style="color:#4CAF50">PÁGINA '.$count.'</legend>
                    <div>
                        <div>';
        echo $text= $p->getText();
        echo '
                    </div>
                </div>
            </fieldset>';
        $count++;
    }  

    echo "<textarea style='display:none' name='texto' form='pdfform'>$text</textarea>";

    ?>
    <button id="anchor" type="button" class="voltar" onclick="window.location='{{ asset('/') }}'">VOLTAR</button>

</body>
</html>