const path = require('path');
const FileManagerPlugin = require('filemanager-webpack-plugin');

module.exports = {
	entry: {
		Survey: path.resolve(__dirname, 'index.js')
	},
	plugins: [
		new FileManagerPlugin({
			onEnd: {
				copy: [
					{source: path.resolve(__dirname, '../../../cl/dist/survey.*'), destination: path.resolve(__dirname, 'dist') }
				]
			}
		})
	]
}
