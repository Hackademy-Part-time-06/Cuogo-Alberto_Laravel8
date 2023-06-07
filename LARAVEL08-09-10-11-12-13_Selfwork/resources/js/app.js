import 'bootstrap';

console.log('hello');

let sessionSuccess = document.getElementById("sessionSuccess");

// Fai scomparire il div dopo 3 secondi
setTimeout(function() {
    sessionSuccess.style.display = 'none';
}, 3000);