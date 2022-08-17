import { useState, useEffect } from "react"
import AuthUser from '../AuthUser'
import {Routes, Route, Link} from "react-router-dom";


export default function Viewtutor(){
    const {http} = AuthUser();
    const [tutor, setTutor] = useState([]);

    useEffect(() =>{
        fetchTutors ();
    },[]);

    const fetchTutors = () => {
        http.get('/tutors').then(res =>{
            setTutor(res.data);
        })
    }

    const deleteTutor = (id) => {
        http.delete('/users/'+id).then(res =>{
            fetchTutors ();
        })
    }


     
    return (
        <div className="mt-3">
            <Link className="inline-block text-success ml-4 mb-4 text-decoration-none" to="/">Back </Link>

            <h2 className="align-items-center text-center text-success mt-3">Tutors List</h2>
            <Link className="btn btn-primary" to={{ pathname:"/add/tutor"}}>Add Tutor</Link>

            <table className="table align-items-center text-center mt-3 ">
                <thead className="text-success text-center">
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    {tutor.map((tutor,index)=>(
                        <tr key={tutor.id}>
                            <td>{++index}</td>
                            <td>{tutor.name}</td>
                            <td>
                                <Link className="btn btn-info" to={{ pathname:"/edit/"+tutor.id}}>Edit</Link> &nbsp;

                                <button type="button" className="btn btn-danger" 
                                onClick={() => {deleteTutor(tutor.id)}}>
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