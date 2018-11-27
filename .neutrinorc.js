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
    '@neutrinojs/react-components',
    '@neutrinojs/karma',
    (neutrino) => {
        neutrino.config
        .externals( {
            react: 'React',
            'react-dom': 'ReactDOM'
        } )
    }
],
};
