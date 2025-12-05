"use strict";
//enemy class
class Enemy {
    constructor(name, health) {
        this.name = name;
        this.health = health;
    }
    takeDamage(damage) {
        this.health -= damage;
    }
}
const maleficio = new Enemy('nosk', 100);
maleficio.takeDamage(20);
maleficio.takeDamage(20);
const output04 = document.getElementById('output04');
if (output04) {
    output04.innerHTML = `
        <li><b>Enemy Name: </b> ${maleficio.name}</li>
        <li><b>Total Health After 2 attacks: </b> ${maleficio.health}</li>

    `;
}
