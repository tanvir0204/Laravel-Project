import { useState } from "react"
import AuthUser from '../AuthUser'
import { useNavigate, useParams } from "react-router-dom";




export default function Login(){
    const navigate = useNavigate();
    const {http, setToken,token} = AuthUser();
    const [email, setEmail] = useState();
    const [password, setPassword] = useState();

    const submitForm = () => {
        /* API CALL */
        http.post('/login', {email:email, password:password}).then((res) => {
            setToken(res.data.user, res.data.token);
            navigate('/');

        })
    }

    return(
        <div className="row justify-content-center pt-5">
            <div className="col-sm-6">
                <div className="card p-4">
                <h2 className="align-items-center text-center text-primary ">Log In</h2>
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
                    <button type="button" onClick={submitForm} className="btn btn-primary mt-4">Log In</button>
                </div>
            </div>
        </div>

    )
}