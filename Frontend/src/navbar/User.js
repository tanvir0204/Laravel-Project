import "bootstrap/dist/css/bootstrap.min.css"; 
import {Routes, Route, Link} from 'react-router-dom';
import Home from '../components/guest/Home';
import AddListing from '../components/user/AddListing';
import ViewListing from '../components/user/ViewListing';
import EditListing from '../components/user/EditListing';
import Listing from '../components/listing/Listing';
import SingleListing from '../components/listing/SingleListing';
import AuthUser from "../components/AuthUser";
import UpdateProfile from '../components/UpdateProfile';

function User() {

    const {token, logout} = AuthUser();
    const logoutUser = () => {
        if(token !== undefined){
            logout();
        }
    }
  
  return (
    <div>
  
        <nav className="navbar navbar-expand-sm bg-success navbar-dark">
          <div className="container-fluid px-5">
            <div className="nav-item ">
              <Link className="nav-link active text-white" to="/"><i class="fas fa-user-graduate text-white"></i>StudyBuddy</Link>
            </div>
            <ul className="navbar-nav"> 
              <li className="nav-item">
                <Link className="nav-link" to="/listing/create"><i class="fa-solid fa-plus"></i> Add Listing</Link>
              </li>

              <li className="nav-item">
                <Link className="nav-link" to="/update/profile"><i class="fa-solid fa-pen-to-square"></i> Manage Profile</Link>
              </li>

              <li className="nav-item">
                <Link className="nav-link" to="/listing"> <i class="fa-solid fa-pen-to-square"></i> Manage Listing</Link>
              </li>

              <li className="nav-item">
                <span role="button" className="nav-link" 
                onClick={logoutUser}
                ><i class="fa-solid fa-door-closed"></i> Log Out</span>
              </li>
            </ul>
          </div>
        </nav>

        {/* Contents */}
        <div className="container">
          <Routes>
            <Route path="/" element={<Listing />}></Route>
            <Route path="/listing/create" element={<AddListing />}></Route>
            <Route path="/update/profile" element={<UpdateProfile />}></Route>
            <Route path="/listing" element={<ViewListing />}></Route>
            <Route path='/edit/:id' element={<EditListing/>}> </Route>
            <Route path='/listing/:id' element={<SingleListing/>}> </Route>
          </Routes>


        </div>

    </div>
  );
}

export default User;
