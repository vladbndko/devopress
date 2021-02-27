const Toastify = require('toastify-js');

const message = (type, message, gravity = 'bottom', position = 'center') => {
  const types = {
    info: '#4e79fb',
    success: '#7fc27e',
    warning: '#f9b74b',
    error: '#ef6e6e',
  };
  Toastify({
    text: message,
    duration: 10000,
    backgroundColor: types[type],
    gravity,
    className: 'is-size-3',
    position,
  }).showToast();
};

export default message;
