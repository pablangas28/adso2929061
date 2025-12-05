const characterName: string = 'Hornet';
const health:        number = 100;
const canDoubleJump: boolean = false;
const tools:         string[] = ['tracks', 'Curveclaw', 'Cogly'];
const memoryLockeds: [number, string] = [1, 'Bone Buttom'];
const FirstSkill:    any = 'Dash';

const output01 = document.getElementById('output01')

if(output01) {
    output01.innerHTML = `
        <li><b>Characters: </b> ${characterName}</li>
        <li><b>Health: </b> ${health}</li>
        <li><b>Can Double Jump: </b> ${canDoubleJump}</li>
        <li><b>Tools: </b> ${tools}</li>
        <li><b>Memory Lockeds: </b> ${memoryLockeds}</li>
        <li><b>First Skill: </b> ${FirstSkill}</li>
    `;
}