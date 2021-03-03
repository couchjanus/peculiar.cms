"use strict";

// let a = +(prompt('Enter a: ', ''));
// let b = Number(prompt('Enter b: ', ''));
// if (isNaN(a) && isNaN(b)){
//     alert('a or b is not a number');
// } 
// else {
//     let o = prompt('Enter operation: ', '');
//     if (o=='+'){
//         alert(a+b);
//     }
//     else if(o=='-'){
//         alert(a-b);
//     }
//     else if(o=='*'){
//         alert(a*b);
//     }
//     else if(o=='%'){
//         alert(a%b);
//     }
//     else if(o=='/' && b != 0){
//         alert(a/b);
//     }
//     else{
//         alert('Wrong operation');
//     }
// }

let a = +(prompt('Enter a: ', ''));
let b = Number(prompt('Enter b: ', ''));
let key = (prompt('Enter operation:', ''));
switch (key) {
    case '+':
        alert(a+b);
        break;
    case '-':
        alert(a-b);
        break;
    case '*':
        alert(a*b);
        break;
    case '/':
        if(b==0){
            alert("b не може бути 0");
        } else {
            alert(a/b);
        }
        break;
    case '%':
        alert(a%b);
        break;
    default:
        alert('Wrong operation')
        break;
}
