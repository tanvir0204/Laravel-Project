import { useEffect, useState } from "react";
import AuthUser from '../AuthUser'
import { useNavigate, useParams } from "react-router-dom";

export default function EditListing(props){
    const {http} = AuthUser();
    const navigate = useNavigate();
    const [inputs, setInputs] = useState({});
    const {id} = useParams();

    useEffect(() => {
        fetchUser();
    },[]);

    const fetchUser = () => {
        http.get('/users/'+id+'/edit').then(res => {
            setInputs({
                name: res.data.name,
                email: res.data.email
            });
        });
    }

    const handleChange = (event) => {
        const name = event.target.name;
        const value = event.target.value;
        setInputs (values => ({...values,[name]:value}))
    }

    const submitForm = () => {
        http.put('/users/'+id,inputs).then((res) => {
            navigate('/');
        })
    }

    return (
        <div>
            <h2>Edit User</h2>

            <div className="row">
                <div className="col-sm-6">
                <div className="card p-4">

                    <label>Name</label>
                    <input type="text" name="name" className="form-control mb-2"
                        value={inputs.name ||''}
                        onChange={handleChange}
                    ></input>

                    <label>Email</label>
                    <input type="text" name="email" className="form-control mb-2"
                        value={inputs.email ||''}
                        onChange={handleChange}
                    ></input>

                    <button type="button" onClick={submitForm}  className="btn btn-info mt-2">Update</button>
                </div>

                </div>


            </div>
        </div>
    )
}