
import React, { Component } from 'react';
// import { Link } from "react-router-dom";
import Sidebar from "../components/Sidebar";
import Navbar from "../components/Navbar";

class Orders extends Component {
    render() {
        return (
            <div className="wrapper">
                <Navbar />
                <div className="main-content">
                    <Sidebar />
                    <div>
                        Orders
                    </div>
                </div>
            </div>
        );
    }
}

export default Orders;
