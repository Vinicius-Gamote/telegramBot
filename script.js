'use strict'

document.getElementById('btnAnswer').addEventListener('click', () => {

    let message = document.getElementById('txtMessage').value;
    const endpoint = 'http://localhost:8000/api.php?m=' + message;
    fetch(endpoint, )
    .then(response => {
        response.json().then(data => {
            console.log(data);
        });
    }).catch(error => {
        console.log(error);
    });
});