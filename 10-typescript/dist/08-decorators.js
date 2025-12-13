"use strict";
//simple class decorator
function PowerUp(constructor) {
    constructor.prototype.powered = true;
}
PowerUp;
class Character {
    constructor() {
        this.name = "Hornet";
    }
}
const Hornet = new Character();
const output08 = document.getElementById('output08');
if (output08) {
    output08.innerHTML = `
        <li><strong>Characters: </strong> ${Hornet.name}</li>
        <li><strong>Powered Up: </strong> ${Hornet.powered}</li>
    `;
}
