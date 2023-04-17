/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    margin:{
      '24': '24px',
      '16': '16px',
      '108': '108px',
      '43': '43px',
      '56':'56px',
      '10': '10px',
      '8':'8px',
      '0': '0px',
      '32': '32px',
    },
    padding: {
      '24': '24px',
      '16': '16px',
      '18': '18px'
    },
    extend: {
      boxShadow: {
        'custom': '-3px 3px 0px #DBE8FB, -3px -3px 0px #DBE8FB, 3px -3px 0px #DBE8FB, 3px 3px 0px #DBE8FB, 3px 3px 0px #DBE8FB',
      },
      width:{
        '137': '137px',
        '604': '604px',
        '392': '392px',
        '20': '20px',
        '343': '343px',
        '90': '90px',
        '164':'164px',
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
      }
    },
  },
  plugins: [],
}

