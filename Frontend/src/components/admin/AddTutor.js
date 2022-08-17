import { useEffect, useState } from "react";
import AuthUser from '../AuthUser'
import { useNavigate, useParams } from "react-router-dom";
import {Routes, Route, Link} from "react-router-dom";

export default function AddTutor(props){
    const {http} = AuthUser();
    const navigate = useNavigate();
    
    const [name, setName] = useState();
    const [email, setEmail] = useState();
    const [password, setPassword] = useState();

    const submitForm = () => {
        /* API CALL */
        http.post('/add/tutor', {name:name, email:email, password:password}).then((res) => {
            navigate('/');
        })
    }


    return (
        <div className="row justify-content-center pt-4">
            <Link className="inline-block text-success ml-4 mb-4 text-decoration-none" to="/tutors/view">Back </Link>

            <div className="row justify-content-center">
                <div className="col-sm-6">
                <div className="card p-4">

                <h2 className="align-items-center text-center text-success ">Add Tutor</h2>

                    <div className="mb-3 mt-3">
                        <label className="form-label">Name:</label>
                        <input type="name" className="form-control" id="name" placeholder="Enter Name" name="name"
                        onChange={e => setName(e.target.value)}/>
                    </div>

                    <div className="mb-3 mt-3">
                        <label className="form-label">Email:</label>
                        <input type="email" className="form-control" id="email" placeholder="Enter email" name="email"
                        onChange={e => setEmail(e.target.value)}/>
                    </div>

                    <div className="mb-3">
                        <label className="form-label">Password:</label>
                        <input type="password" className="form-control" id="password" placeholder="Enter password" name="password"
                        onChange={e => setPassword(e.target.value)}/>
                    </div>
                    <button type="button" onClick={submitForm}  className="btn btn-success mt-2">Add</button>
                </div>

                </div>


            </div>
        </div>
    )
}