import { SET_USERS, REMOVE_USER, SET_USER_NAME } from '../action/action'

export default function (state = [], action) {
	const { type, username, user } = action

	switch (type) {
		case SET_USERS:
			return {
				...state,
				user: action.payload

			}
		case SET_USER_NAME:
			return { ...state, name: action.payload }

		case REMOVE_USER:
			return state.filter(i => i !== user)
		default:
			return state
	}
}
