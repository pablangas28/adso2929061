"use strict";
// function with typed parameters and return type
function calculatsAttack(baseDamage, multiplier) {
    return baseDamage * multiplier;
}
const attak = calculatsAttack(15, 3);
const output03 = document.getElementById('output03');
if (output03) {
    output03.innerHTML = `
        <li><b>Base Damage: </b> 15</li>
        <li><b>Multiplier: </b> X3</li>
        <li><b>Total Attack: </b> ${attak}</li>
    `;
}
