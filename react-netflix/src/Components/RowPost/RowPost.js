import axios from "../../axios";
import React, { useEffect, useState } from "react";
import "./RowPost.css";
import { imageUrl } from "../../constants/constants";

function RowPost(props) {
    console.log(props.data,'propssss');
    return (
        <div className="row">
            <h2>{props.title}</h2>
            <div className="posters">
                {props.data?.map((movie) => (
                    <div className="poster-container">
                        <img
                            key={movie.id}
                            className="samllPoster"
                            alt=""
                            src={`${imageUrl + movie.image}`}
                            style={{height:"15rem",width:"11rem"}}
                        />
                        <h4>{movie.name}</h4>
                    </div>
                ))}
            </div>
        </div>
    );
}

export default RowPost;
