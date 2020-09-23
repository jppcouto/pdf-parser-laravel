<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
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
                margin-bottom: 30px;
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

        </style>

<?php
echo "<div class=\"title m-b-md\">O PDF foi carregado com sucesso!<br></div>";

        
// Include Composer autoloader if not already done.
include base_path() . '/vendor/autoload.php';

// Parse pdf file and build necessary objects.
$parser = new \Smalot\PdfParser\Parser();
$link = base_path() . "/storage/app/$path";
$pdf    = $parser->parseFile("$link");

// Retrieve all details from the pdf file.
$details  = $pdf->getDetails();


echo "<form action='' method='post'>
    <input type='hidden' name='_token' value=".csrf_token().">
    <fieldset>
        <legend style='color:#4CAF50'>METADATA</legend>
        <div>
            <div>
                <table>
                    <tr>
                        <td style='font-weight: bold'>Nome:</td>
                        <td><input type='text' name='stud_name' value=".$path."></td>
                    </tr>
                    <tr>
                        <td style='font-weight: bold'>Criador:</td>
                        <td><input type='text' name='stud_name' value=".$details['Producer']." disabled></td>
                    </tr>
                    <tr>
                        <td style='font-weight: bold'>Data de criação:</td>
                        <td><input type='text' name='stud_name' value=".$details['CreationDate']." disabled></td>
                    </tr>
                    <tr>
                        <td style='font-weight: bold'>Páginas:</td>
                        <td><input type='text' name='stud_name' value=".$details['Pages']." disabled></td>
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