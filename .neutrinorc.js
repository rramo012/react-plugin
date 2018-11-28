module.exports = {
  use: [
    ['@neutrinojs/standardjs',
        {
        eslint: {
            baseConfig: {
                extends: 'eslint-config-wordpress'
            }
        }
    }],
    [
      '@neutrinojs/react',
      {
        html: {
          title: 'react-plugin'
        }
      }
    ],
    '@neutrinojs/karma',
    (neutrino) => {
        neutrino.config
        .externals( {
            react: 'React',
            'react-dom': 'ReactDOM'
        } );

        neutrino.config.output
            .filename( '[name].js' );

        neutrino.config.devServer
            .publicPath( './build' )
            .proxy( {
                '**': {
                    target: 'http://localhost/',
                    changeOrigin: true,
                    headers: {
                        'X-Dev-Server-Proxy': 'http://localhost/',
                        'X-Dev-Server-URL': 'http://localhost:5000/'
                    }
                }
            } );
    }
  ]
};
