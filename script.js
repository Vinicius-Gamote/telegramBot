'use strict'

document.getElementById('btnSend').addEventListener('click', () => {

    const message = document.getElementById('txtMessage').value;
    const endpoint = 'http://localhost:8000/api.php?m=' + message;

    if (message.trim().length <=0){
        alert('Write a message!')
        return;
    }

    fetch(endpoint, )
        .then(response => {
            response.json().then(data => {
            console.log(data);
        });
    }).catch(error => {
        console.log(error);
    });
});