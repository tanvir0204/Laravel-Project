import { useEffect, useState } from "react";
import AuthUser from '../AuthUser'
import { useNavigate, useParams } from "react-router-dom";
import {Routes, Route, Link} from 'react-router-dom';

export default function SingleListing(props){
    const {http} = AuthUser();
    const navigate = useNavigate();
    const [inputs, setInputs] = useState({});
    const [comment, setComment] = useState([]);
    const [text, setText] = useState();
    const [listing_id, setListingId] = useState('');
    const {id} = useParams();

    useEffect(() => {
        fetchListing();
        fetchComment();
    },[]);

    const fetchListing = () => {
        http.get('/listings/'+id+'/edit').then(res => {
            setInputs({
                listing_id: res.data.listing_id,
                title: res.data.title,
                location: res.data.location,
                tags: res.data.tags,
                description: res.data.description,
                number: res.data.number
            });
            setListingId(res.data.id);
        });
    }


    const fetchComment = () => {
        http.get('/comments/'+id+'/edit').then(res => {
            setComment(res.data);
        });
    }

    const submitForm = () => {
        /* API CALL */
        let comment = document.querySelector('#comment');
        
        http.post('/add/comment', {text:text, listing_id:listing_id}).then((res) => {
            
        })
        http.get('/comments/'+id+'/edit').then(res => {
            setComment(res.data);
        });
        comment.value='';

    }

    return (
        <div className="mt-3">
           <Link className="inline-block text-success ml-4 mb-4 text-decoration-none" to="/"><i class="fa-solid fa-arrow-left mr-2"></i>Back </Link>

           <div className="mx-4">
                <div className="bg-green-50 border border-gray-200 rounded p-6">
                    <div className="flex flex-col items-center justify-center text-center">
                        <img className="w-48 mr-6 mb-6" src="/images/no-image.png"/>
                        <h3 className="text-2xl mb-2">{inputs.title}</h3>
                        <h3 className="text-2xl mb-2">{inputs.location}</h3>
                        <p>Contact only if you are eligible</p>
                        <div className="border border-gray-200 w-full mb-6"></div>

                        <div>
                            <h3 className="text-3xl font-bold mb-4">
                                Tuiton Description
                            </h3>
                            <div className="text-lg space-y-6 w-13">
                                {inputs.description}
                            </div>
                        </div>


                    </div>

                </div>
           </div>

            <div className="md:flex">
                <div className="w-30 p-2 mt-2">
                    <ul>
                        {comment.map((comment,index)=>(
                            <tr key={comment.id}>
                                <li className="mt-2 flex justify-between items-center bg-white hover:shadow-lg rounded cursor-pointer transition w-full mb-10">
                                    <div className="flex ml-2">
                                        <img className="rounded-full" width="85" height="40" src="/images/user.png"/>

                                        <div className="flex flex-col ml-2">
                                            <span className="text-2xl text-green-700 mb-2"><i className="fa-regular fa-comments mr-2"></i>
                                                {comment.user.name}
                                            </span>
                                            <span className="font-serif text-2xl text-slate-900">
                                                {comment.text}
                                            </span>
                                        </div>
                                    </div>
                                </li>
                            </tr>
                        ))} 
                    </ul>
                </div>
            </div>
            
            <div  className="max-w-full bg-slate-200 shadow-md">
                <div className="mb-2 p-2">
                    <h4 for="comment" classname="text-lg text-gray-600">Add a comment</h4>
                    <textarea className="w-full h-20 p-2 border rounded focus:outline-none focus:ring-gray-300 focus:ring-1"
                    name="text" placeholder="" id="comment"
                    onChange={e => setText(e.target.value)}></textarea>
                </div>
                    <button type="submit" onClick={submitForm} className="px-3 py-2 ml-2 text-sm text-blue-100 bg-success rounded">Comment</button>
            </div>
            
        </div>
    )
}