<style>
    /* Reset */
  * {
    margin: 0;
    padding:0;
    box-sizing: border-box;
  }
  
  /* Main Styling */
  html,body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    line-height: 1.7em;
  }
  
  a {
    color: #333;
    text-decoration: none;
  }
  
  h1, h2, h3 {
    padding-bottom: 20px;
  }
  
  p {
    margin: 10px 0;
  }
  
  /* Utility Classes */
  .container {
    margin: auto;
    max-width: 1100px;
    overflow: auto;
    padding: 0 20px;
  }
  
  .text-primary {
    color: #28DF99;
  }
  
  .lead {
    font-size: 20px;
  }
  
  .btn {
    display: inline-block;
    font-size: 18px;
    color: #fff;
    background: #333;
    padding: 13px 20px;
    border: none;
    cursor: pointer;
    border-radius: 10px;
  }
  
  .btn:hover {
    background: #28DF99;
    color: #333;
    border-radius: 10px;
  }
  
  .btn-light {
    background: #f4f4f4;
    color: #333;
  }
  
  .bg-dark {
    background: #333;
    color: #fff;
  }
  
  .bg-light {
    background: #f4f4f4;
    color: #333;
  }
  
  .bg-primary {
    background: #28DF99;
    color: #333;
  }
  
  .clr {
    clear: both;
  }
  
  .l-heading {
    font-size: 40px;
    line-height: 1.2 ;
  }
  
  /* Padding */
  .py-1 { padding: 10px 0; }
  .py-2 { padding: 20px 0; }
  .py-3 { padding: 30px 0; }
  
  /* Navbar */
  #navbar {
    /* background: #333; */
    background: #333;
    color: #fff;
    overflow: auto;
  }
  
  #navbar a {
    color: #fff;
  }
  
  #navbar .logo {
    float: left;
    padding-top: 20px;
  }
  
  #navbar ul {
    list-style: none;
    float: right;
  }
  
  #navbar ul li {
    float: left;
  }
  
  #navbar ul li a {
    display: block;
    padding: 20px;
    text-align: center;
  }
  
  #navbar ul li a:hover,
  #navbar ul li a.current {
    background: #444;
    color: #28DF99;
  }
  
  /* Showcase */
  .dash{
    display: block;
    padding-top: 20px;
    text-align: center;
  
  }
  .dash:hover{
    background: #444;
    color: #28DF99;
  
  }
  #showcase {
    
    /* background: url('home.jpg') no-repeat center center/cover;
    height: 600px; */
    
    background: #333 url('home.jpg') no-repeat center center/cover;
    /* height: 100vh; */
    height: 500px;
    color: #fff;
  }
  
  #showcase .showcase-content {
    display: flex;
    flex-direction: column;
    text-align: center;
    justify-content: center;
    align-items: center;
    height: 100%;
    padding: 0 2rem;
    /* Overlay */
    position: absolute;
    top: 65px;
    left:0;
    right: 0;
    bottom: 0;
  
    background-color: rgba(0,0,0,0.4);
  }
  /* #showcase .showcase-content {
    color: #fff;
    text-align: center;
    padding-top: 170px;
  } */
  
  #showcase .showcase-content h1 {
    font-size: 60px;
    line-height: 1.2em;
  }
  
  #showcase .showcase-content p {
    padding-bottom: 20px;
    line-height: 1.7em;
  }
  
  /* Home Info */
  #home-info {
    height: 450px;
  }
  
  #home-info .info-img {
    float: left;
    width: 50%;
    background: url('../img/photo-1.jpg') no-repeat;
    min-height: 100%;
  }
  
  #home-info .info-content {
    float: right;
    width: 50%;
    height: 100%;
    text-align: center;
    padding: 50px 30px;
    overflow: hidden;
  }
  
  #home-info .info-content p {
    padding-bottom: 30px;
  }
  
  /* Features */
  .box {
    float: left;
    width: 33.3%;
    padding: 50px;
    text-align:center;
  }
  
  .box i {
    margin-bottom: 10px;
  }
  
  /* About Info */
  #about-info .info-right {
    float: right;
    width: 50%;
    min-height: 100%;
  }
  
  #about-info .info-right img {
    display: block;
    margin: auto;
    width: 70%;
    border-radius: 50%;
  }
  
  #about-info .info-left {
    float: left;
    width: 50%;
    min-height: 100%;
  }
  
  /* Testimonials */
  #testimonials {
    height: 100%;
    background: url('../img/test-bg.jpg') no-repeat center center/cover;
    padding-top: 100px;
  }
  
  #testimonials h2 {
    color: #fff;
    text-align: center;
    padding-bottom: 40px;
  }
  
  #testimonials .testimonial {
    padding: 20px;
    margin-bottom: 40px;
    border-radius: 5px;
    opacity: 0.9;
  }
  
  #testimonials .testimonial img {
    width: 100px;
    float: left;
    margin-right: 20px;
    border-radius: 50%;
  }
  
  /* Contact Form */
  #contact-form .form-group {
    margin-bottom: 20px;
  }
  
  #contact-form label {
    display: block;
    margin-bottom: 5px;
  }
  
  #contact-form input,
  #contact-form textarea {
    width: 100%;
    padding: 10px;
    border: 1px #ddd solid;
  }
  
  #contact-form textarea {
    height: 200px;
  }
  
  #contact-form input:focus,
  #contact-form textarea:focus {
    outline: none;
    border-color: #f7c08a;
  }
  
  /* Footer */
  #main-footer {
    text-align: center;
    background: #444;
    color: #fff;
    padding: 20px;
  }
  
  </style>