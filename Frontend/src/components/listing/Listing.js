import { useState, useEffect } from "react"
import AuthUser from '../AuthUser'
import {Routes, Route, Link} from "react-router-dom";


export default function Listing(){
    const {http} = AuthUser();
    const [listing, setListing] = useState([]);
    const [search1, setSearch1] = useState([]);

    useEffect(() =>{
        fetchListings ();
    },[]);

    const fetchListings = () => {
        http.get('/listings/all').then(res =>{
            setListing(res.data);
            setSearch1(res.data);
        })
    }
    
    const search = (e) => {
        let temp = [...search1];

        let kw= e.target.value;
        if(kw!=''){
            let temp1 = listing.filter(entry => Object.values(entry).some(val => typeof val === "string" && val.includes(kw)));
            setListing(temp1);
        }else {
            setListing(temp);
        }
    }
 
    return (
        <div className="container mt-5 mb-5">
                <h2 className="mb-3 text-success">Available Tuitions</h2>
                <input onChange={(e)=>search(e)} className="w-100 h-100 p-2 border rounded focus:outline-none focus:ring-gray-300 focus:ring-1" placeholder="Search"/>
               
                <div className="mt-5 row">
                    {listing.map(listing => (
                        <div className="col-md-6">
                            <div className="card mb-4">
                                <div className="card-body">
                                    <h5 className="card-title">{listing.title}</h5>
                                    <p className="card-text">{listing.description}</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">{listing.tags}</li>
                                </ul>
                                <div class="card-footer text-muted">
                                    <p class="card-text">Location: {listing.location}</p>
                                </div>
                                <div class="card-footer text-muted">
                                    <Link className="btn btn-info" to={{ pathname:"/listing/"+listing.id}}>View</Link>
                                </div>
                            </div>
                        </div>
                    ))}
                </div>
        </div>
    )
}