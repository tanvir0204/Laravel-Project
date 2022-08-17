import "bootstrap/dist/css/bootstrap.min.css"; 
import {Routes, Route, Link} from 'react-router-dom';
import Home from '../components/guest/Home';
import Login from '../components/guest/Login';
import UserRegister from '../components/user/Register';
import TutorRegister from '../components/tutor/Register';
import Listing from '../components/guest/Listing';

function Guest() {
  
  return (
    <div>
        <nav className=" navbar navbar-expand-sm bg-primary navbar-dark flex justify-between items-center ">
          <div className="container-fluid px-5">
          <div className="nav-item ">
              <Link className="nav-link active text-white" to="/"><i class="fas fa-user-graduate text-white"></i>StudyBuddy</Link>
            </div>
            <ul className="navbar-nav">
             
              <li className="nav-item">
                <Link className="nav-link" to="/login"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</Link>
              </li>
              <li className="nav-item">
                <Link className="nav-link" to="/user/register"> <i className="fa-solid fa-user-plus"></i> Register as Parent</Link>
              </li>
              <li className="nav-item">
                <Link className="nav-link" to="/tutor/register"><i className="fa-solid fa-user-plus"></i>  Register as Tutor</Link>
              </li>
            </ul>
          </div>
        </nav>

        {/* Contents */}
        <div className="container">
          <Routes>
            <Route path="/" element={<Listing />}></Route>
            <Route path="/login" element={<Login />}></Route>
            <Route path="/user/register" element={<UserRegister  />}></Route>
            <Route path="/tutor/register" element={<TutorRegister  />}></Route>
          </Routes>
        </div>
    </div>
  );
}

export default Guest;
