import React, { Component } from "react";
import { NavLink } from "react-router-dom";

class Sidebar extends Component {
	constructor(props) {
		super(props);
		this.state = {
			menus: [
				{
					url: "/",
					label: "Dashboard",
					icon: "fa fa-home"
				},
				{
					url: "/products",
					label: "Products",
					icon: "fa fa-archive"
				},
				{
					url: "/orders",
					label: "Orders",
					icon: "fa fa-clipboard-list"
				},
				{
					url: "/coupons",
					label: "Coupons",
					icon: "fa fa-percentage"
				},
			]
		};
	}

	get listMenus() {
		let { menus } = this.state;
		if (menus && menus.length > 0) {
			let listMenus = menus.map((item, index) => {
				return (
					<li className="nav-item" key={index}>
						<NavLink
							exact
							className="nav-link"
							to={item.url}
							activeClassName="active"
						>
							<i className={item.icon}></i>
							<span className="ml-3">{item.label}</span>
						</NavLink>
					</li>
				);
			});

			return listMenus;
		}

		return [];
	}

	render() {
		return (
			<div className="sidebar pt-3">
				<ul className="navbar-nav sidebar sidebar-dark accordion">
					{/* list menu */}
					{this.listMenus}
				</ul>
			</div>
		);
	}
}

export default Sidebar;
