const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
      ],

    theme: {
        extend: {

            colors: {
                'blue':'#328af1',
                'blue-hover':'#2879bd',
                'yellow' :'#ffc73c',
                'red'   : '#ec454f',
                'green' : '#1aab8b',
                'purple' : '#8b60ed'


            },
            fontFamily: {
                sans: ['Open Sans', ...defaultTheme.fontFamily.sans],
            },
            maxWidth: {
                custom: '65.5rem',
            },
            spacing: {
               70: '17.5rem' , 
               175: '43.75rem'      
            }

        },
    },

    plugins: [  require('@tailwindcss/forms'), 
                require('@tailwindcss/line-clamp'),
            ],
    
};
