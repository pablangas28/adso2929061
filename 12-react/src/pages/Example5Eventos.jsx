import { useState } from 'react';
import BtnBack from '../components/BtnBack';

function Example5Events() {
  const [chosenPokemon, setChosenPokemon] = useState(null);
  const [hoveredPokemon, setHoveredPokemon] = useState(null);
  const [inputRange, setInputRange] = useState(50);

  // Event Click
  const handleChoice = (name) => {
    setChosenPokemon(name);
  };

  // Event Hover MouseEnter
  const handleMouseEnter = (name) => {
    setHoveredPokemon(name);
  };

  // Event MouseLeave
  const handleMouseLeave = () => {
    setHoveredPokemon(null);
  };

  // Event Input
  const handleInput = (e) => {
    setInputRange(e.target.value);
  };

  return (
    <div className='container'>
      <BtnBack />
      <h2>Example 5: Event Handling</h2>
      <p>Respond to user interactions (click, hover, input, submit).</p>
      <div style={styles.eventContainer}>
        
        {/* Click */}
        <h3 style={styles.titleH3}>Click Event:</h3>
        <div style={styles.btnsClick}>
          <button onClick={() => handleChoice('Bulbasaur')} style={styles.buttonStyle}>
            <span style={{zoom: 2.4}}></span> Bulbasaur
          </button>
          <button onClick={() => handleChoice('Charmander')} style={styles.buttonStyle}>
            <span style={{zoom: 2.4}}></span> Charmander
          </button>
          <button onClick={() => handleChoice('Squirtle')} style={styles.buttonStyle}>
            <span style={{zoom: 2.4}}></span> Squirtle
          </button>
        </div>

        {chosenPokemon ? (
          <div style={styles.chosePokemon}>You choose {chosenPokemon}!</div>
        ) : (
          <div style={styles.chosePokemon}>Please choose a pokemon!</div>
        )}

        {/* MouseEnter/MouseLeave */}
        <h3 style={styles.titleH3}>MouseEnter/MouseLeave Event:</h3>
        <div style={styles.btnsClick}>
          <button 
            onMouseEnter={() => handleMouseEnter('Pikachu')} 
            onMouseLeave={handleMouseLeave} 
            style={styles.hoverStyle}
          >
            Hover here!
            <img style={{zoom: 0.4}} src="25.png" alt="" />
          </button>
          
          <button 
            onMouseEnter={() => handleMouseEnter('Eevee')} 
            onMouseLeave={handleMouseLeave} 
            style={styles.hoverStyle}
          >
            Hover here too!
            <img style={{zoom: 0.4}} src="133.png" alt="" />
          </button>
        </div>

        {hoveredPokemon && (
          <div style={styles.chosePokemon}>You are viewing: {hoveredPokemon}!</div>
        )}

        {/* Input */}
        <h3 style={styles.titleH3}>Input Event:</h3>
        <input 
          style={styles.rangeStyle} 
          onInput={handleInput} 
          type="range" 
          min="0" 
          max="100" 
          value={inputRange}
        />
        <span style={{display: 'block', textAlign: 'center'}}>power:</span>
        <div style={styles.outPut}>{inputRange}</div>

      </div>
    </div>
  );
}

export default Example5Events;