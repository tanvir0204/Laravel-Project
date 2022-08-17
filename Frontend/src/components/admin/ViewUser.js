import { useState, useEffect } from "react"
import AuthUser from '../AuthUser'
import {Routes, Route, Link} from "react-router-dom";


export default function ViewUser(){
    const {http} = AuthUser();
    const [user, setUser] = useState([]);

    useEffect(() =>{
        fetchUsers ();
    },[]);

    const fetchUsers = () => {
        http.get('/users').then(res =>{
            setUser(res.data);
        })
    }

    const deleteUser = (id) => {
        http.delete('/users/'+id).then(res =>{
            fetchUsers ();
        })
    }


     
    return (
        <div className="mt-3">
            <Link className="inline-block text-success ml-4 mb-4 text-decoration-none" to="/">Back </Link>

            <h2 className="align-items-center text-center text-success mt-3">Users List</h2>
            <Link className="btn btn-primary" to={{ pathname:"/add/user"}}>Add User</Link>

            <table className="table align-items-center text-center mt-3">
                <thead className="text-success text-center">
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    {user.map((user,index)=>(
                        <tr key={user.id}>
                            <td>{++index}</td>
                            <td>{user.name}</td>
                            <td>
                                <Link className="btn btn-info" to={{ pathname:"/edit/"+user.id}}>Edit</Link> &nbsp;

                                <button type="button" className="btn btn-danger" 
                                onClick={() => {deleteUser(user.id)}}>
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