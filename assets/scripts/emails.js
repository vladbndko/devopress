const axios = require('axios');
const qs = require('qs');
const _ = require('lodash');
const { load } = require('recaptcha-v3');
const config = require('../../devopress.config.json');
import message from './message';

/*
 * ==================================================
 * Common logic
 * ==================================================
 * */

// Show message after submit the form
const responseHandler = ({ sendStatus }) => {
  const text = sendStatus.text;
  return {
    error: () => {
      message('error', text);
      return false;
    },
    success: () => {
      message('success', text);
      return true;
    },
  };
};

// Clean all validation messages and classes
const clearValidationErrors = (form) => {
  const invalidedControls = form.querySelectorAll('.is-invalid');
  invalidedControls.forEach((invalidedControl) => invalidedControl.classList.remove('is-invalid'));
  const invalidFeedbacks = form.querySelectorAll('.invalid-feedback');
  invalidFeedbacks.forEach((invalidFeedback) => invalidFeedback.remove());
};

// Clean the validation message and class
const clearTheValidationError = (name, form) => {
  const control = form.querySelector(`.is-invalid[name="${name}"]`);
  control.classList.remove('is-invalid');

  if (control.classList.contains('form-check-input')) {
    control.parentNode.querySelector('.invalid-feedback').remove();
  } else if (control.classList.contains('form-control')) {
    control.nextElementSibling.remove();
  }
};

const clearValidationErrorIfExists = ({ target }, form) => {
  if (target.classList.contains('is-invalid')) {
    clearTheValidationError(target.getAttribute('name'), form);
  }
};

// Fully toggle disabled form
const setReadableForm = (form, disabled) => {
  const inputs = form.getElementsByTagName('input');
  const selects = form.getElementsByTagName('select');
  const textareas = form.getElementsByTagName('textarea');
  const buttons = form.getElementsByTagName('button');
  [...inputs, ...selects, ...textareas].forEach((control) => {
    if (disabled) {
      control.setAttribute('readonly', 'readonly');
    } else {
      control.removeAttribute('readonly');
    }
  });
  [...buttons].forEach((control) => {
    if (disabled) {
      control.setAttribute('disabled', 'disabled');
    } else {
      control.removeAttribute('disabled');
    }
  });
};

const fillErrors = (errorsObject, form) => {
  Object.keys(errorsObject).forEach((name) => {
    const control = form.querySelector(`[name="${name}"]`);
    if (control) {
      control.classList.add('is-invalid');
      const errorEl = document.createElement('div');
      errorEl.classList.add('invalid-feedback');
      errorEl.textContent = errorsObject[name][0];
      if (control.classList.contains('form-check-input')) {
        // Checkbox and radio
        control.parentNode.append(errorEl);
      } else if (control.classList.contains('form-control')) {
        // Input, textarea, select
        control.insertAdjacentElement('afterend', errorEl);
      }
    }
  });
};

/*
 * ==================================================
 * Send message form
 * ==================================================
 * */
const sendMessageForm = document.getElementById('send-message');
if (sendMessageForm) {
  const button = sendMessageForm.querySelector('button[type="submit"]');
  const action = sendMessageForm.getAttribute('action');

  sendMessageForm.addEventListener('input', (e) =>
    clearValidationErrorIfExists(e, sendMessageForm),
  );
  sendMessageForm.addEventListener('change', (e) =>
    clearValidationErrorIfExists(e, sendMessageForm),
  );

  sendMessageForm.addEventListener('submit', (e) => {
    e.preventDefault();
    setReadableForm(e.target, true);
    button.classList.add('is-loading');
    clearValidationErrors(e.target);
    const formData = Object.fromEntries(new FormData(e.target));
    load(config.recaptcha.site_key).then((recaptcha) => {
      recaptcha.execute('send_message').then((token) => {
        axios
          .post(action, qs.stringify({ ...formData, token }))
          .then((response) => {
            if (!responseHandler(response.data)[response.data.sendStatus.type]()) {
              if (_.has(response.data, 'errors')) {
                fillErrors(response.data.errors, e.target);
              }
            } else {
              e.target.reset();
            }
          })
          .catch((error) => {
            console.error(error);
          })
          .finally(() => {
            button.classList.remove('is-loading');
            setReadableForm(e.target, false);
          });
      });
    });
  });
}
