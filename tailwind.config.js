/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    margin:{
      '3': '3px',
      '24': '24px',
      '16': '16px',
      '43': '43px',
      '8':'8px',
      '18': '18px',
      '108': '108px',
      '56':'56px',
      '40': '40px',
      '337': '337px',
      '0': '0px',
      '191': '191px',
      '94': '94px',
      '10': '10px',
      '32': '32px',
      '53': '53px',
      '9': '9px',
      '77': '77px',
      '214': '214px',
      '252': '252px',
      '148': '148px',
      '240': '240px',
      '1.5': '1.5px'
    },
    padding: {
      '24': '24px',
      '16': '16px',
      '43': '43px',
      '8':'8px',
      '18': '18px'
    },
    extend: {
      boxShadow: {
        'statistics': '1px 2px 8px rgba(0, 0, 0, 0.04)',
        'custom': '-3px 3px 0px #DBE8FB, -3px -3px 0px #DBE8FB, 3px -3px 0px #DBE8FB, 3px 3px 0px #DBE8FB, 3px 3px 0px #DBE8FB',
      },

      maxWidth: {
        '77': '77px',
        '65': '65px'
      },
      width:{
        '137': '137px',
        '604': '604px',
        '392': '392px',
        '20': '20px',
        '343': '343px',
        '90': '90px',
        '164':'164px',
        '77': '77px',
        '239': '239px',
        '500': '500px',
        '186': '186px',
        '65': '65px'
      },
      colors:{
        'dark-black': '#010414',
        'gray': '#808189',
        'light-gray': "#E6E6E7",
        'blue':"#2029F3",
        'bl': '#2029F3',
        'red': '#CC1E1E',
        'green': '#249E2C',
        'gr':"#F6F6F7",
        'purple': '#2029F3',
        'bggreen': '#249E2C',
        'bgyellow': '#EAD621',
      },
      backgroundColor:{
        'green': '#0FBA68'
      },
      height:{
        '33': '33px',
        '900': '900px',
        '20': '20px',
        '48': '48px',
        '56': '56px',
        '255': '255px',
        '193': '193px',
        '50': '50px',
        '603': '603px'
      }
    },
  },
  plugins: [],
}

