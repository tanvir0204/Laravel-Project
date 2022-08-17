import { useState, useEffect } from "react"
import AuthUser from '../AuthUser'
import {Routes, Route, Link} from "react-router-dom";


export default function Listing(){
    const {http} = AuthUser();
    const [listing, setListing] = useState([]);

    useEffect(() =>{
        fetchListings ();
    },[]);

    const fetchListings = () => {
        http.get('/listing/all').then(res =>{
            setListing(res.data);
        })
    }
 
    return (
        <div className="container mt-5 mb-5">
                <h2 className="mb-3 text-success">Available Tuitions</h2>
                <div className="row">
                    {listing.map(listing => (
                        <div className="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">{listing.title}</h5>
                                    <p class="card-text">{listing.description}</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">{listing.tags}</li>
                                </ul>
                                <div class="card-footer text-muted">
                                    <p class="card-text">Location: {listing.location}</p>
                                </div>
                                {/* <div class="card-footer text-muted">
                                    <Link className="btn btn-info" to={{ pathname:"/listing/"+listing.id}}>View</Link>
                                </div> */}
                            </div>
                        </div>
                    ))}
                </div>
        </div>
    )
}