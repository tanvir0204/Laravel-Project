import { useState } from "react"
import AuthUser from '../AuthUser'
import { useNavigate } from "react-router-dom";
import {Routes, Route, Link} from 'react-router-dom';


export default function AddListing(){
    const navigate = useNavigate();

    const {http} = AuthUser();

    const [title, setTitle] = useState();
    const [location, setLocation] = useState();
    const [tags, setTags] = useState();
    const [description, setDescription] = useState();
    const [number, setNumber] = useState();

    const submitForm = () => {
        /* API CALL */
        http.post('/listings/create', {title:title, location:location, tags:tags, description:description, number:number}).then((res) => {
            navigate('/');
        })
    }

    return(
        <div className="row justify-content-center pt-4">
            <Link className="inline-block text-success ml-4 mb-4 text-decoration-none" to="/">Back </Link>

            <div className="col-sm-6">
                
                <div className="card p-4">
                    <h2 className="align-items-center text-center text-success">Post a Tuition</h2>
                    <h5 className="mb-4 align-items-center text-center text-success">Post a Tuition to find a Tutor</h5>

                <div className="mb-3 mt-3">
                        <label className="form-label">Title:</label>
                        <input type="text" className="form-control" id="title" placeholder="Enter Title" name="title"
                        onChange={e => setTitle(e.target.value)}/>
                    </div>

                    <div className="mb-3 mt-3">
                        <label className="form-label">Location:</label>
                        <input type="text" className="form-control" id="location" placeholder="Enter Location" name="location"
                        onChange={e => setLocation(e.target.value)}/>
                    </div>

                    <div className="mb-3">
                        <label className="form-label">Tags:</label>
                        <input type="text" className="form-control" id="tags" placeholder="Enter Tags" name="tags"
                        onChange={e => setTags(e.target.value)}/>
                    </div>

                    <div className="mb-3">
                        <label className="form-label">Description:</label>
                        <input type="text" className="form-control" id="description" placeholder="Enter Description" name="description"
                        onChange={e => setDescription(e.target.value)}/>
                    </div>

                    <div className="mb-3">
                        <label className="form-label">Number:</label>
                        <input type="text" className="form-control" id="number" placeholder="Enter Number" name="number"
                        onChange={e => setNumber(e.target.value)}/>
                    </div>
                    <button type="button" onClick={submitForm} className="btn btn-success mt-4">Add Listing</button>
                </div>
            </div>
        </div>

    )
}