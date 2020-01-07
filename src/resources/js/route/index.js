import React from 'react';
import { HashRouter, Route, Switch } from 'react-router-dom';
// import { Router } from "react-router";
import { TitleComponent } from '../components/Title.jsx';
import { createBrowserHistory } from "history";

const history = createBrowserHistory();

// pages
import Home from '../pages/Home.jsx';
import Products from '../pages/Products.jsx';
import Orders from '../pages/Orders.jsx';
import Coupons from '../pages/Coupons.jsx';


// // withTitle function
const withTitle = ({ component: Component, title }) => {
	return class Title extends Component {
		render() {
			return (
				<React.Fragment>
					<TitleComponent title={title} />
					<Component {...this.props} />
				</React.Fragment>
			);
		}
	};
};

// // Adding title
const HomePage = withTitle({ component: Home, title: 'Home - My React App' });
const ProductsPage = withTitle({ component: Products, title: 'Products - My React App' });
const OrdersPage = withTitle({ component: Orders, title: 'Orders - My React App' });
const CouponsPage = withTitle({ component: Coupons, title: 'Products - My React App' });


const AppRoute = () => {
	return (
		<HashRouter>
			<Switch history={history}>
				<Route exact path="/" component={HomePage} />
				<Route path="/products" component={ProductsPage} />
				<Route path="/Orders" component={OrdersPage} />
				<Route path="/Coupons" component={CouponsPage} />
			</Switch>
		</HashRouter>
	)
}


export default AppRoute
