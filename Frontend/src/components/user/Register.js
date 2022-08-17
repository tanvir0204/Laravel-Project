import { useState } from "react"
import AuthUser from '../AuthUser'
import { useNavigate } from "react-router-dom";


export default function Register(){
    const navigate = useNavigate();

    const {http} = AuthUser();

    const [name, setName] = useState();
    const [email, setEmail] = useState();
    const [password, setPassword] = useState();

    const submitForm = () => {
        /* API CALL */
        http.post('/user/register', {name:name, email:email, password:password}).then((res) => {
            navigate('/login');
        })
    }

    return(
        <div className="row justify-content-center pt-5">
            <div className="col-sm-6">
                <div className="card p-4">
                <h2 className="align-items-center text-center text-primary ">Register as a Parent</h2>
                <p className="align-items-center text-center text-primary ">Register to find a Tutor</p>

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
                    <button type="button" onClick={submitForm} className="btn btn-primary mt-4">Register</button>
                </div>
            </div>
        </div>

    )
}