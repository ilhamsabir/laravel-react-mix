
import React, { Component } from 'react';
// import { Link } from "react-router-dom";
import Sidebar from "../components/Sidebar";
import Navbar from "../components/Navbar";
import PageHome from "../components/pages/Home";
// import LisUser from "../components/ListUser.jsx";

class Home extends Component {
	render() {
		return (
			<div className="wrapper">
				<Navbar />
				<div className="main-content">
					<Sidebar />
					<PageHome />
				</div>
			</div>
		);
	}
}

export default Home;
