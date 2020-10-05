<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Interaktiv berättelse</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Interaktiv berättelse</h1>
        <?php
        $chatt = "";
        $fråga = 0;

        // Finns data?
        if (isset($_POST["input"], $_POST["chatt"], $_POST["fråga"])) {

            // Ta emot data från formuläret
            $input = $_POST["input"];
            $chatt = $_POST["chatt"];
            $fråga = $_POST["fråga"];

            // Frågor och svar
            $chatt .= "Du> $input\n";

            switch ($fråga) {
                // Första fråga och svaren
                case 1:
                    if ($input == "vänster") {
                        $chatt .= "Bott> Rummet ser ut att tillhöra ett barn. Men så mycket som du vet, så har den gamle tant inga barn eller har aldrig varit gift. 
                        Du hör fotsteg i korridoren. I rummet finns det ett halvt öppet fönster eller en garderob. 
                        Väljer du fönstret eller garderoben?\n";
                        $fråga = 2;
                    } elseif ($input == "höger") {
                        $chatt .= "Bott> Bakom dörren finns det trappor som leder ner till källaren. Källaren är mörk och kall. Mot väggen står en bokhylla med dammiga böcker och gamla fotografier. En av dem fångar ditt intresse och du vill kolla närmare på den. Men samtidigt har du en känsla att du kanske borde vända om. Ska du kolla närmare eller vända om?\n";
                        $fråga = 3;
                    } else {
                        $chatt .= "Bott> Jag förstod inte vad du skrev. Försök en gång till?";
                        $fråga = 4;
                    }
                    break;

                    // Andra frågan och svaren
                case 2:
                    if ($input == "fönstret") {
                        $chatt .= "Bott> Du känner en obehaglig känsla av att vara i rummet så du bestämmer dig för att fly. Grattis, du kom undan\n";
                        $fråga = 5;
                    } elseif ($input == "garderoben") {
                        $chatt .= "Bott> Du bestämmer dig för att utforska lite och få reda på varför rummet finns. Du gömmer dig i garderoben, men medans du kliver in öppnas dörren och tanten kommer in. Better luck next time.\n";
                        $fråga = 6;
                    }
                    break;

                case 3:
                    if ($input == "kolla närmare") {
                        $chatt .= "Bott> Du går fram till den och i samma stund hör du hur trapporna bakom dig gör ett knarrande ljud. En varm hand tar tag om din arm. Game over.\n";
                        $fråga = 7;

                    break;
                } elseif ($input == "vänd om") {
                    $chatt .= "Bott> Din blick är fast vid fotografiet en kort stund till, när du väl vänder dig om står tanten där men luren mot örat. Konsekvenserna kommer bli hårda.\n";
                    $fråga = 8;
                }
        }
    } else {
            $fråga = 1;
            $chatt = "Bott> Du befinner dig i din grannens hus, mer specifikt, hennes korridor. I slutet finns det två dörrar. Väljer du vänster eller höger?\n";
        }
        ?>        
        <form action="#" method="POST">
            <textarea name="chatt" id="" cols="30" rows="10" readonly><?php echo $chatt; ?></textarea>
            <input id="input" class="form-control" type="text" name="input">
            <input type="hidden" name="fråga" value="<?php echo $fråga; ?>">
            <button type="submit" class="btn btn-primary">Skicka</button>
        </form>
    </div>
</body>
</html>