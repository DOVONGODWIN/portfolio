import { useState } from 'react'
import './App.css'

// Interface TypeScript pour définir la structure d'une tâche
interface Todo {
  id: number
  text: string
  completed: boolean
}

function App() {
  // HOOK useState : C'est le cœur de React pour gérer l'état local
  // [valeur, fonctionPourModifierLaValeur] = useState(valeurInitiale)
  const [todos, setTodos] = useState<Todo[]>([])
  const [inputValue, setInputValue] = useState('')

  // FONCTION : Ajouter une nouvelle tâche
  const addTodo = () => {
    // Vérifier que l'input n'est pas vide
    if (inputValue.trim() === '') return
    
    // Créer un nouvel objet Todo
    const newTodo: Todo = {
      id: Date.now(), // Utiliser le timestamp comme ID unique
      text: inputValue.trim(),
      completed: false
    }
    
    // Mettre à jour l'état avec la nouvelle tâche
    // On utilise le spread operator (...) pour créer un nouveau tableau
    setTodos([...todos, newTodo])
    
    // Vider l'input
    setInputValue('')
  }

  // FONCTION : Basculer l'état d'une tâche (complétée/non complétée)
  const toggleTodo = (id: number) => {
    setTodos(todos.map(todo => 
      todo.id === id 
        ? { ...todo, completed: !todo.completed }
        : todo
    ))
  }

  // FONCTION : Supprimer une tâche
  const deleteTodo = (id: number) => {
    setTodos(todos.filter(todo => todo.id !== id))
  }

  // FONCTION : Gérer la soumission du formulaire avec la touche Entrée
  const handleKeyPress = (e: React.KeyboardEvent) => {
    if (e.key === 'Enter') {
      addTodo()
    }
  }

  return (
    <div className="app">
      <h1>📝 Ma Todo List React</h1>
      
      {/* SECTION : Formulaire d'ajout */}
      <div className="todo-form">
        <input
          type="text"
          value={inputValue}
          onChange={(e) => setInputValue(e.target.value)}
          onKeyPress={handleKeyPress}
          placeholder="Ajouter une nouvelle tâche..."
          className="todo-input"
        />
        <button onClick={addTodo} className="add-button">
          Ajouter
        </button>
      </div>

      {/* SECTION : Liste des tâches */}
      <div className="todo-list">
        {todos.length === 0 ? (
          <p className="empty-message">Aucune tâche pour le moment. Ajoutez-en une !</p>
        ) : (
          todos.map(todo => (
            <div 
              key={todo.id} 
              className={`todo-item ${todo.completed ? 'completed' : ''}`}
            >
              {/* Checkbox pour marquer comme complétée */}
              <input
                type="checkbox"
                checked={todo.completed}
                onChange={() => toggleTodo(todo.id)}
                className="todo-checkbox"
              />
              
              {/* Texte de la tâche */}
              <span className="todo-text">{todo.text}</span>
              
              {/* Bouton de suppression */}
              <button 
                onClick={() => deleteTodo(todo.id)}
                className="delete-button"
              >
                🗑️
              </button>
            </div>
          ))
        )}
      </div>

      {/* SECTION : Statistiques */}
      {todos.length > 0 && (
        <div className="stats">
          <p>Total: {todos.length} tâche(s)</p>
          <p>Complétées: {todos.filter(todo => todo.completed).length}</p>
          <p>En cours: {todos.filter(todo => !todo.completed).length}</p>
        </div>
      )}
    </div>
  )
}

export default App

