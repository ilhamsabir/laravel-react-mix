
import React, { Component } from 'react';
import { connect } from 'react-redux';
import { fetchUser, setUserName } from '../store/action/user';
// import {createStore} from 'redux';

@connect((store) => {
	return {
		user: store.user.user,
		username: store.user.name,
	};
})

class ListUser extends Component {
	constructor(props) {
		super(props)
		this.state = {
			title: "user list"
		}
	}

	componentDidMount() {
		this.props.dispatch(fetchUser())
	}

	_onClick(selected) {
		this.props.dispatch(setUserName(selected.name))
	}

	get listUser() {
		let { user } = this.props;
		if (user && user.length > 0) {
			let listuser = user.map((item, index) => {
				return <li key={index} onClick={this._onClick.bind(this, item)}>{item.name}, {item.year}</li>
			});
			return listuser;
		}

		return [];
	}

	get userName() {
		let { username } = this.props
		return username;
	}

	render() {
		return (
			<div>
				<h2>{this.state.title}</h2>
				<ul>{this.listUser}</ul>

				<div>Selected</div>
				<span>{this.userName}</span>
			</div>
		);
	}
}


export default ListUser;
