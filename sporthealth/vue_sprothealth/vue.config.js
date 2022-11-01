module.exports = {
	lintOnSave: false,
	devServer: {
		port: 8082,
		proxy: {
			"/api": {
				target: "http://api.sport.com/",
				ws: true,
				changeOrigin: true,
				pathRewrite: {
					"^/api": "",
				},
			},
		},
	},
};
