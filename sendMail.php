<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loanDate = $_POST["loanDate"];
    $loanedBy = $_POST["loanedBy"];
    $loanedTo = $_POST["loanedTo"];
    $name = $_POST["name"];
    $status = $_POST["status"];

    $to = "j.vtipil@esl.cz";  // Nahraď svou e-mailovou adresou
    $subject = "Nová půjčka v systému";
    $message = "
        Nová půjčka byla zaregistrována:

        📅 Datum půjčky: $loanDate
        👤 Půjčeno od: $loanedBy
        🎯 Půjčeno pro: $loanedTo
        📦 Název: $name
        ✅ Stav: $status
    ";
    $headers = "j.vtipil@esl.cz" . "\r\n" .
               "j.vtipil@esl.cz" . "\r\n" .
               "Content-Type: text/plain; charset=UTF-8";

    // Odeslání e-mailu
    if (mail($to, $subject, $message, $headers)) {
        echo "E-mail úspěšně odeslán.";
    } else {
        echo "Chyba při odesílání e-mailu.";
    }
} else {
    echo "Neplatná metoda požadavku.";
}
?>
