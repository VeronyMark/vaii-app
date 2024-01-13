// script.js

document.getElementById('publishBtn').addEventListener('click', function (e) {
    e.preventDefault();

    // Získajte hodnoty zo vstupných polí
    var title = document.getElementById('title').value;
    var body = document.getElementById('body').value;

    // Vytvorte FormData objekt pre odoslanie súboru
    var formData = new FormData();
    var fileInput = document.querySelector('input[name="file_upload"]');
    formData.append('file_upload', fileInput.files[0]);

    // Pridajte ďalšie parametre, ktoré chcete odoslať (title, body, atď.)
    formData.append('title', title);
    formData.append('body', body);

    // Odoslať AJAX požiadavku
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/posts/store', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Spracovanie odpovede a aktualizácia časti stránky
            var response = JSON.parse(xhr.responseText);
            if (response.success) {
                // Zobrazte nahratú fotku s názvom a možnosťou stiahnuť
                // Môžete to urobiť napríklad vytvorením nového elementu obrázka a pridanie ho k nejakej existujúcej časti stránky.
            } else {
                // Spracovanie chyby
                console.error(response.message);
            }
        }
    };
    xhr.send(formData);
});
