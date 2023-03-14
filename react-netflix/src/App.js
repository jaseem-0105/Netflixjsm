import React, { useEffect, useState } from "react";
import "./App.css";
import Banner from "./Components/Banner/Banner";
import Navbar from "./Components/NavBar/NavBar";
import "./Components/NavBar/NavBar.css";
import RowPost from "./Components/RowPost/RowPost";
import { originals, action, horror, comedy, romance } from "./urls";
import axios from "axios";

function App() {
    const [genre, setGenre] = useState();
    useEffect(() => {
        axios
            .post("http://localhost:8000/api/get-all-genre")
            .then((response) => {
                console.log(response.data.data, "app");
                setGenre(response.data.data);
            });
    }, []);

    return (
        <div className="App">
            <Navbar />
            <Banner />
            {genre?.map((genre, index) => (
                <RowPost key={index} data={genre.movies} title={genre.name} />
            ))}
        </div>
    );
}

export default App;
