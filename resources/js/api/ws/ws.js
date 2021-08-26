import { date } from '../../common.js';

export class Server
{
	constructor(to, token, tryConnection = 3) {
		this.to 			= to;
		this.token 			= token;
		this.tryConnection 	= tryConnection;
		this.isReconnect 	= false;
	}

	connect() {
		if (!this.tryConnection--) return;
		this.server = new WebSocket(`${this.to}${this.token}`);
	}

	async connectViaToken() {
	 	const res = await fetch('http://framework.loc/wsToken');
	 	const token = await res.text();
 		if (res == 'error') {
 			throw new Error('Session error');
 		} else {
			this.token = '/' + token;
			cl(token)
 			this.connect();
 		}
	}

	send(data) {
		this.server.send(JSON.stringify(data));
	}
}