import { useState, useEffect } from "react"
import AuthUser from '../AuthUser'
import {Routes, Route, Link} from "react-router-dom";



export default function ViewListing(){
    const {http} = AuthUser();
    const [listing, setListing] = useState([]);

    useEffect(() =>{
        fetchListings ();
    },[]);

    const fetchListings = () => {
        http.get('/listings').then(res =>{
            setListing(res.data);
        })
    }

    const deleteListing = (id) => {
        http.delete('/listings/'+id).then(res =>{
            fetchListings ();
        })
    }


     
    return (
        <div className="mt-4">
            <Link className="inline-block text-success ml-4 mb-4 text-decoration-none" to="/">Back </Link>

            <h2 className="align-items-center text-center text-success mt-3">Tution Listings</h2>
            <table className="table mt-4">
                <thead className="text-success"> 
                    <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    {listing.map((listing,index)=>(
                        <tr key={listing.id}>
                            <td>{++index}</td>
                            <td>{listing.title}</td>
                            <td>
                                <Link className="btn btn-info" to={{ pathname:"/edit/"+listing.id}}>Edit</Link> &nbsp;

                                <button type="button" className="btn btn-danger" 
                                onClick={() => {deleteListing(listing.id)}}>
                                Delete
                                </button>

                            </td>
                        </tr>

                    ))}
                    

                </tbody>

            </table>
        </div>
    )
}