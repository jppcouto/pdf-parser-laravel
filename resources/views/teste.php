    <?php
     
    // Include Composer autoloader if not already done.
    include base_path() . '/vendor/autoload.php';
    ?>
    <style>
        <?php include base_path() . '/resources/css/style.css';?>
    </style>
    <?php
    // Parse pdf file and build necessary objects.
    $parser = new \Smalot\PdfParser\Parser();
    $link = base_path() . '/resources/pdf/sample.pdf';
    $pdf    = $parser->parseFile("$link");
     
    // Retrieve all details from the pdf file.
    $details  = $pdf->getDetails();

    echo    '<fieldset class="collapsible form-wrapper" id="edit-page-detail">
                <legend><span class="fieldset-legend">Metadata</span></legend>
                <div class="fieldset-wrapper">
                    <div class="page">
                        <table class="table table-striped table-condensed">';
     
    // Loop over each property to extract values (string or array).
    foreach ($details as $property => $value) {
        if (is_array($value)) {
            $value = implode(', ', $value);
        }
        
        //echo '<p>'.$property. ' => ' . $value. '</p>';
        echo '<tr><td><strong>'.$property.'</strong></td><td>'.$value.'</td></tr>';
                        
    }

    echo '
                    </table>
                </div>
            </div>
        </fieldset>';

    $space= '<p></p>';
    echo $space;


    // Retrieve all pages from the pdf file.
    $pages  = $pdf->getPages();
    $count=1;
 
    // Loop over each page to extract text.
    foreach ($pages as $page) {
        echo    '<fieldset class="collapsible form-wrapper" id="edit-page-detail">
                    <legend><span class="fieldset-legend">Página '.$count.'</span></legend>
                    <div class="fieldset-wrapper">
                        <div class="page">';
        echo $page->getText();
        echo '
                    </div>
                </div>
            </fieldset>';
        $count++;
    }
     
?>
