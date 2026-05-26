import { useState, useEffect, useRef } from 'react';
import BtnBack from '../components/BtnBack';

function Example4StateHooks() {
  const [caughtPokemon, setCaughtPokemon] = useState(null);
  const [loading, setLoading] = useState(false);
  const [catchCounter, setCatchCounter] = useState(0);
  const [history, setHistory] = useState([]);
  const hasMounted = useRef(false);

  const pokemonList = [
    { name: 'Pikachu', img: '25.png' },
    { name: 'Charmander', img: '14.png' },
    { name: 'Squirtle', img: '7.png' }
  ];

  const catchPokemon = () => {
    setLoading(true);
    setTimeout(() => {
      const randomIndex = Math.floor(Math.random() * pokemonList.length);
      const newPokemon = pokemonList[randomIndex];
      
      setCaughtPokemon(newPokemon);
      setCatchCounter(prev => prev + 1);
      setHistory(prev => [newPokemon, ...prev]);
      setLoading(false);
    }, 2000);
  };

  useEffect(() => {
    if (!hasMounted.current) {
      hasMounted.current = true;
      catchPokemon();
    }
  }, []);

  return (
    <div className="container">
      <BtnBack />
      <h2>Example 4: State and Hooks</h2>
      <h3>(useState, useEffect)</h3>
      <p>Manage dynamic data and side effects.</p>
      
      <div style={styles.section}>
        <button onClick={catchPokemon} disabled={loading} style={styles.button}>
          {loading ? 'Catching...' : 'Try again'}
        </button>
        
        {loading ? (
          <h3>Searching for a wild Pokémon...</h3>
        ) : (
          <div>
            {caughtPokemon && (
              <>
                <h3>You caught a {caughtPokemon.name}!</h3>
              </>
            )}
          </div>
        )}
      </div>

      <div style={{ marginTop: '2rem' }}>
        <p><strong>Total caught:</strong> {catchCounter}</p>
        {history.length > 0 && (
          <div>
            <p><strong>Recently caught:</strong></p>
            <div style={styles.recently}>
              {history.map((poke, index) => (
                <div key={index} style={styles.history}>
                  <img src={poke.img} alt={poke.name} style={styles.img} />
                  <span style={styles.span}>{poke.name}</span>
                </div>
              ))}
            </div>
          </div>
        )}
      </div>
    </div>
  );
}

export default Example4StateHooks;