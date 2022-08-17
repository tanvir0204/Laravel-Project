import "bootstrap/dist/css/bootstrap.min.css"; 
import './App.css';
import AuthUser from "./components/AuthUser";
import Guest from "./navbar/Guest";
import Admin from "./navbar/Admin";
import Tutor from "./navbar/Tutor";
import User from "./navbar/User";
import { useEffect, useState } from 'react';

function App() {

  const {http,getUser,getToken} = AuthUser();
  const [userdetail,setUserdetail] = useState('');
  const [type,setType] = useState('');
  
  



  if(!getToken()){
    return <Guest/>
  }
  else{
    return(
      getUser().type =='user' ? <User/> : getUser().type=='admin' ? <Admin/> : <Tutor/>
    )
    
  }

}

export default App;
