export default class
{
	constructor(server) {
		this.server = server;
	}

	sendMessage(message) {
		this.server.sendMessage(message);
	}
}