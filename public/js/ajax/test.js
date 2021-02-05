'use strict';
// 
function el(selector) {
  return document.querySelector(selector);
}

function myConsole(c, status='') {
  let message, alertClass, text;
  switch (c) {
    case 1:
        message = '1: Подготовка к отправке...';
        alertClass = 'alert-primary';
        break;
    case 2:
        message = '2: Отправлен...';
        alertClass = 'alert-primary';
        break;
    case 3:
        message = '3: Идет обмен...';
        alertClass = 'alert-warning';
        break;
    case 4:
        message = '4: Обмен завершен!';
        alertClass = 'alert-success';
        break;
    case 5:
        message = 'Ошибка: запрашиваемый скрипт не найден!';
        alertClass = 'alert-danger';
        break;
    case 6:
        message = 'Ошибка: сервер вернул статус: ' + status;
        alertClass = 'alert-danger';
        break;
    default:
      break;     
  }
  text = `<div class="alert ${alertClass}" role="alert">${message}</div>`;
	el("#console").innerHTML += text;
}
const getData = () => {
  myConsole(1, 500);
}
(function() {
  el('.getBtn').addEventListener('click', getData);
})();