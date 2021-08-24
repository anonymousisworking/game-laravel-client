const DUPLICATE = '1';

class Server
{
	constructor(to, token, tryConnection = 3) {
		this.to 			= to;
		this.token 			= token;
		this.tryConnection 	= tryConnection;
		this.isReconnect 	= false;
		this.callbacks 		= [];

		this.$messages 		= document.querySelector('#messages');
	}

	connect() {
		if (!this.tryConnection--) return;
		this.server = new WebSocket(`${this.to}${this.token}`);

		this.server.onMessage = 
	}

	connectViaToken() {
		$.get('/wsToken', res => {
	 		if (res == 'error') {
	 			throw new Error('Session error');
	 		} else {
				this.token = '/' + res;
	 			this.connect();
	 		}
	 	});
	}

	send(data) {
		this.server.send(JSON.stringify(data));
	}

	message(response) {
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
		const action = Object.keys(data)[0];

		if (action != 'message') {
			const callback = this.callbacks[action] || this[action];
			
			if (callback) {
				callback.call(this, data[action]);
			}
		}
		
	    this.handleMessage(data.message);
	}

	append(msg) {
        this.$messages.append(`<div class="msg">${date('H:i:s')} ${msg}</div>`);
    }


	handleMessage() {
		switch (typeof message) {
	    	case 'string': this.append(message);break;
	    	case 'object': this.append(`${message.from}: ${message.text}`);break;
	    }
		
		this.scrollDown();
	}

	scrollDown() {
		this.$messages[0].scrollTop = this.$messages[0].scrollHeight;
	}
}