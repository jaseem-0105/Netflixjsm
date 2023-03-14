import React, { useEffect, useState } from "react";
import { API_KEY, imageUrl } from "../../constants/constants";
import "./Banner.css";
import axios from "../../axios";

function Banner() {
    const [movie, setMovie] = useState();
    useEffect(() => {
        axios
            .post("http://localhost:8000/api/get-all-movies")
            .then((response) => {
                if (response.data.success) {
                    let random = 1;
                    random = Math.floor(
                       ( Math.random() * response.data?.data?.length) + 1
                    );
                    // console.log(random);
                    // console.log(response.data.data[3],'banner')
                    setMovie(response.data.data[random]);
                }
            });
    }, []);
    return (
        <div
            style={{
                backgroundImage: `url(${movie ? imageUrl + movie.image : ""})`,
            }}
            className="banner"
        >
            <div className="content">
                <h1 className="title">{movie ? movie.name : ""}</h1>
                <div className="banner_button">
                    <button className="button">Play</button>
                    <button className="button">My List</button>
                </div>
                <h1
                    className="description"
                    dangerouslySetInnerHTML={{ __html: movie?.description }}
                />
            </div>
            <div className="fade_bottom"></div>
        </div>
    );
}

export default Banner;
