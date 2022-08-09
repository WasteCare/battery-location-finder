module.exports = {
  lintOnSave: true,
  publicPath: process.env.NODE_ENV === 'production'
    ? '/wp-content/plugins/battery-location-finder/dist/'
    : 'http://localhost:8080/',
  // filenameHashing: false,
  outputDir: './dist',
  productionSourceMap: false,
  configureWebpack: {
    devServer: {
      contentBase: '/wp-content/plugins/wastecare-location-finder/dist/',
      //  allowedHosts: ['localhost:82'],
      headers: {
        'Access-Control-Allow-Origin': '*'
      }
    },
    externals: {
      jquery: 'jQuery'
    },
    output: {
      filename: 'js/[name].js',
      chunkFilename: 'js/[name].js'
    }
  },
  css: {
    extract: {
      filename: 'css/[name].css',
      chunkFilename: 'css/[name].css'
    }
  }
}
