const axios = require('axios');
const qs = require('qs');
const { load } = require('recaptcha-v3');
const config = require('../../../devopress.config.json');

const sendMessageForm = document.getElementById('send-message');

if (sendMessageForm) {
  const button = sendMessageForm.querySelector('button[type="submit"]');
  const action = sendMessageForm.getAttribute('action');

  sendMessageForm.addEventListener('submit', (e) => {
    e.preventDefault();

    const formData = Object.fromEntries(new FormData(e.target));
    load(config.recaptcha.site_key).then((recaptcha) => {
      recaptcha.execute('send_message').then((token) => {
        axios
          .post(action, qs.stringify({ ...formData, token }))
          .then((response) => {
            console.log(response);
          })
          .catch((error) => {
            console.error(error);
          })
          .finally(() => {
            console.log('Finally');
          });
      });
    });
  });
}
