const path = require('path');

module.exports = {
	entry: {
		Survey: {
			import: path.resolve(__dirname, 'index.js'),
			dependOn: ['Course', 'Users', 'Site']
		}
	}
}
