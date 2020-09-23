<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 100;
                height: 50vh;
                margin: 20px;
            }

            .full-height {
                height: 100vh;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 50px;
                text-align: center;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 20px;
            }

            input[type=submit] {
            height: 100%;
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;

            }

            input[type=submit]:hover {
            background-color: #45a049;
            }

            .voltar {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 100%;
            margin-bottom: 20px;
            }

        </style>


<div class="title m-b-md">
    O PDF foi carregado com sucesso! 
    <a href="#anchor"><i class='fas fa-arrow-alt-circle-down' style='font-size:48px;color:#4CAF50'></i></a>
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


echo "<form action='/add' method='post'>
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
    echo $p->getText();
    echo '
                </div>
            </div>
        </fieldset>';
    $count++;
}  

echo    '<input type = "hidden" name="texto" value = '.$alltext.'">
        </form> ';
        

?>
<button id="anchor" type="button" class="voltar" onclick="window.location='{{ asset('/') }}'">VOLTAR</button>