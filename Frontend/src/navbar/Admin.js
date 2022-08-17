import "bootstrap/dist/css/bootstrap.min.css"; 
import {Routes, Route, Link} from 'react-router-dom';
import Home from '../components/guest/Home';
import ViewUser from '../components/admin/ViewUser';
import EditUser from '../components/admin/EditUser';
import ViewTutor from '../components/admin/ViewTutor';
import ViewListing from '../components/admin/ViewListing';
import AddUser from '../components/admin/AddUser';
import AddTutor from '../components/admin/AddTutor';
import ManageProfile from '../components/admin/ManageProfile';
import EditListing from '../components/admin/EditListing';
import AuthUser from "../components/AuthUser";
import Listing from '../components/listing/Listing';


function Admin() {

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
                <Link className="nav-link" to="/update/profile"><i class="fa-solid fa-pen-to-square"></i> Manage Profile</Link>
              </li>

              <li className="nav-item">
                <Link className="nav-link" to="/users/view"><i class="fa-solid fa-user"></i> Manage Users</Link>
              </li>

              <li className="nav-item">
                <Link className="nav-link" to="/tutors/view"><i class="fa-solid fa-user"></i> Manage Tutors</Link>
              </li>

              <li className="nav-item">
                <Link className="nav-link" to="/listings/view"><i class="fa-solid fa-list"></i> Manage Listings</Link>
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
            <Route path="/update/profile" element={<ManageProfile />}></Route>
            <Route path="/users/view" element={<ViewUser />}></Route>
            <Route path="/tutors/view" element={<ViewTutor />}></Route>
            <Route path="/listings/view" element={<ViewListing />}></Route>
            <Route path='/edit/:id' element={<EditUser/>}> </Route>
            <Route path='/listing/edit/:id' element={<EditListing/>}> </Route>
            <Route path='/add/user' element={<AddUser/>}> </Route>
            <Route path='/add/tutor' element={<AddTutor/>}> </Route>
          </Routes>
        </div>
    </div>
  );
}

export default Admin;
