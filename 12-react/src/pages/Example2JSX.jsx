import BtnBack from "../components/BtnBack";

function Example2JSX() {
  // Variable
  const pkName = 'Bulbasaur!';
  const pkType = 'Grass/Poison';
  const pkLevel = 5;
  const pkAbilities = ['Overgrow', 'Chlorophyll'];
  const pkImgUrl = ""; // URL o ruta de la imagen

  return (
    <div className="container">
      <BtnBack />
      <h2>Example 2: JSX</h2>
      <p>Writing HTML-Like code whitin JavaScript using curly braces {} for JS expresions.</p>
      <div style={styles.container}>
        <img src={pkImgUrl} alt={pkName} style={styles.img} />
        <h3 style={styles.title}>{pkName} (Lvl. {pkLevel})</h3>
        <p>Type: {pkType}</p>
        <p>Uppercase: {pkName.toUpperCase()}</p>
        <p>Abilities: </p>
        <ul style={styles.ul}>
          {pkAbilities.map((ability, index) => (
            <li key={index}>{ability}</li>
          ))}
        </ul>
        <p>Is it a starter? {pkLevel === 5 ? 'Yes' : 'No'}</p>
      </div>
    </div>
  );
}

export default Example2JSX;