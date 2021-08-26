import { Server } from './api/ws/ws';

const DUPLICATE = '1';

export default class {
	constructor() {
		this.callbacks = {};
		this.wsBind();
	}

	init() {
		this.server = new Server(`ws://192.168.0.101:8080`);
		this.server.connectViaToken()
	}

	send(data) {
		this.server.send(data);
	}

	message(response) {
		// cl(response);
		switch (response.data) {
			case DUPLICATE:
				if (this.isReconnect) {
					this.isReconnect = false;
				} else {
		    		this.exit();
				}
				
				return;
			break;
		}

		const data 	 = JSON.parse(response.data);
		const event = Object.keys(data)[0];

		if (typeof this.callbacks[event] == "undefined") return;

		this.callbacks[event].forEach(subscriber => {
			subscriber.cb.call(subscriber.ctx, data[event]);
		});
	}

	chloc(locId) {
		this.send({chloc: locId});
	}

	sendMessage(message) {
		this.send({message});
	}

	


	handleMessage(message) {
		switch (typeof message) {
	    	case 'string': this.append(message);break;
	    	case 'object': this.append(`${message.from}: ${message.text}`);break;
	    }
		
		this.scrollDown();
	}

	scrollDown() {
		this.$messages.scrollTop = this.$messages.scrollHeight;
	}

	wsBind() {
		let ws = window.WebSocket;
		let app = this;

		window.WebSocket = function(a, b) {
			let that = b ? new ws(a, b) : new ws(a);
			['message'].forEach(event => that.addEventListener(event, app[event].bind(app)));
			// ['open', 'message', 'error', 'close'].forEach(event => that.addEventListener(event, app[event].bind(app)));
			return that;
		};

		window.WebSocket.prototype=ws.prototype; 
	}

	subscribe(event, cb, ctx) {
		if (typeof this.callbacks[event] == "undefined") this.callbacks[event] = [];
		this.callbacks[event].push({cb, ctx});
	}
}