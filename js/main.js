function validation1() {
    // Hole die Liste aller ausgewählten Checkboxen (checked).
    let radioButton = document.querySelectorAll('input[type=radio]:checked'); //CSS3 Selektor!!!!!

    if (radioButton.length === 0) {
        // Die Liste der Checkboxen ist leer - es wurde keine ausgewählt.
        setWarning("Bitte wähle eine Antwort aus.");
        return false; // Submit-Aktion abbrechen 
    }
}

function setWarning(text) {
    let warningElement = document.getElementById("validation-warning");
    warningElement.innerText = text; 
}

