import { has } from 'lodash';
import { load } from 'recaptcha-v3';

import api from '../api';
import toast from '../toast';

const messageForm = () => ({
  loading: false,
  accept: false,
  errors: {},
  body: {
    name: '',
    email: '',
    message: '',
    source: '',
    token: '',
  },
  init() {
    this.body.source = this.$refs.source.value;
  },
  handleChange(key) {
    if (this.errors[key]) {
      this.errors[key] = null;
    }
  },
  button: {
    [':disabled']() {
      return !this.accept || this.loading;
    },
    [':class']() {
      return { 'is-loading': this.loading };
    },
  },
  async submit() {
    this.loading = true;
    try {
      if (this.$refs.siteKey) {
        const recaptcha = await load(this.$refs.siteKey.value);
        this.body.token = await recaptcha.execute('message_form');
      }
      const response = await api.message.send(this.body);
      this.body.name = '';
      this.body.email = '';
      this.body.message = '';
      this.accept = false;
      if (has(response, 'data.message')) {
        toast.success(response.data.message);
      }
    } catch (error) {
      if (has(error, 'response.data.message')) {
        toast.error(error.response.data.message);
      }
      if (has(error, 'response.data.errors')) {
        this.errors = error.response.data.errors;
      }
    } finally {
      this.loading = false;
    }
  },
});

export default messageForm;
