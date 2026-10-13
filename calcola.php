<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercitazione Form</title>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php
        $marca = $_POST["marca"];
        $modello = $_POST["modello"];
        $stato = $_POST["stato"];
        $anno = $_POST["anno"];
        $cilindrata = $_POST["cilindrata"];
        $cavalli = $_POST["cavalli"];
        $prezzo = $_POST["prezzo"];
        $targa = $_POST["targa"];
        $descrizione = trim($_POST["descrizione_aggiuntiva"]);

        $descrizione_file = $descrizione;
        if (empty($descrizione)) {
            $descrizione = "Non &egrave stata inserita nessuna descrizione.";
            $descrizione_file = "Nessuna descrizione"; 
        }

        if (empty($_POST["accessori"])) {
            $accessori = "";
        } else {
            $accessori = $_POST["accessori"];
        }

        $accessori_stringa = "";


        if (empty($accessori)) { 
            $accessori_stringa = "Nessun accessorio selezionato.";
        } else {
            $accessori_stringa = implode(", ", $accessori);

        }


        //CREAZIONE FILE E RECORD

        // SCRITTURA
        $nomeFile = "F_AUTO.DAT";

        $file = fopen($nomeFile, "a");
        
        $record = "[NUOVA RICHIESTA] ";
        $record .= implode("; ", [$marca, $modello, $stato, $anno, $cilindrata, $cavalli, $prezzo, $targa, $accessori_stringa, $descrizione_file]);
        $record .= "\n---------------------------------------------\n";
        

        fwrite($file, $record);
        fclose($file);
        
    ?>

    <fieldset>
            <legend>
                <strong><i><u>Inserimento Auto</u></i></strong> 
            </legend>

            <br>

            <table>
                <tr>
                    <td class="area_blu"><p>Marca</p></td>
                    <td> <?php echo $marca; ?></td>
                </tr> 

                <tr>
                    <td class="area_blu"><p>Modello</p></td>
                    <td> <?php echo $modello; ?></td>
                </tr> 

                <tr>
                    <td class="area_blu"><p>Stato</p></td>
                    <td> <?php echo $stato; ?></td>
                </tr>

                <tr>
                    <td class="area_blu"><p>Anno Costruzione</p></td>
                    <td> <?php echo $anno; ?></td>
                </tr>

                <tr>
                    <td class="area_blu"><p>Cilindrata</p></td>
                    <td> <?php echo $cilindrata; ?></td>
                </tr> 

                <tr>
                    <td class="area_blu"><p>Cavalli</p></td>
                    <td> <?php echo $cavalli; ?></td>
                </tr> 

                <tr>
                    <td class="area_blu"><p>Prezzo</p></td>
                    <td> <?php echo $prezzo; ?></td>
                </tr> 

                <tr>
                    <td class="area_blu"><p>Targa</p></td>
                    <td> <?php echo $targa; ?></td>
                </tr> 

                <tr>
                    <td class="area_blu"><p>Accessori</p></td>
                    <td class="area_dx"> <?php echo $accessori_stringa; ?></td>
                </tr>

                <tr>
                    <td class="area_blu"><p>Descrizione Aggiuntiva</p></td>
                    <td> <?php echo $descrizione; ?></td>
                </tr>
            </table>

            <br> <br>
            
            <button onclick="history.back()" style="width: 100px;">Torna indietro</button>

            <br> <br>

        </fieldset>
</body>
</html>