import { Notyf } from 'notyf';

const notyf = new Notyf({
  duration: 6000,
  position: {
    x: 'right',
    y: 'bottom',
  },
  types: [
    {
      type: 'success',
      background: '#16a34a',
      icon: false,
    },
    {
      type: 'error',
      background: '#e11d48',
      icon: false,
    },
  ],
});

export default {
  success(message) {
    notyf.success(message);
  },
  error(message) {
    notyf.error(message);
  },
};
