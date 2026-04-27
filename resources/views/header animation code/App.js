import "./App.css";
import "./components/animated-header.css";
import AnimatedHeader from "./components/AnimatedHeader";

function App() {
  return (
    <div className="App">
      <AnimatedHeader />
      <section style={{ padding: "80px 32px", maxWidth: 1200, margin: "0 auto", color: "#111" }}>
        <h2 style={{ fontSize: 32, fontWeight: 800, marginBottom: 12 }}>
          Browse by Category
        </h2>
        <p style={{ color: "#666", maxWidth: 620 }}>
          Your content goes here.
        </p>
      </section>
    </div>
  );
}

export default App;