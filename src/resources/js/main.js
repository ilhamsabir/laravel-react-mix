import React from 'react';
import ReactDOM from 'react-dom';
import { Provider } from 'react-redux';
import store from "./store/store";
import Route from './route';
// import './assets/css/main.css';
// import Home from './pages/Home.jsx';


if (document.getElementById('app')) {
	ReactDOM.render(
	<Provider store={store}>
		<Route />
	</Provider>,
	document.getElementById('app'));
}
