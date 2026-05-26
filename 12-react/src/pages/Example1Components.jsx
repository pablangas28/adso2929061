import BtnBck from "../components/BtnBck";

// Component Charmander
function Charmander() {
    return (
        <div style={{}}>
            <h2>🔥 Charmander</h2>
            <p>Type: Fire</p>
            <p>Ability: Blaze</p>
        </div>
    );
}
//component squirtle
function Squirtle() {
    return (
        <div style={{}}>
            <h2>💧 Squirtle</h2>
            <p>Type:Wather</p>
            <p>Ability: Torrent</p>
        </div>
    );
}

function Example1Components() {
    return(
        <div className="container">
            <BtnBck />
            <h2>Example 1: Components</h2>
            <p>Create independient a reusable UI pieces.</p>
            <div style={{}}>
                <Charmander />
                <Squirtle />
            </div>
        </div>
    );
}

export default Example1Components;